<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Sinhvien;
use DateTime;

class Psr2Controller extends BaseController
{
    public function getListStore()
    {
        $type = [0 => "--"] + InformationType::whereNull('information_types.deleted_at')->lists('type_content', 'id')->toArray();
        $listInfo = Information::select('informations.*', 'staffs.first_name', 'staffs.last_name')
            ->leftJoin('staffs', function ($join) {
                $join->on('informations.created_by', '=', 'staffs.id');
            })
            ->Join('information_types', function ($join) {
                $join->on('informations.infor_type_id', '=', 'information_types.id')
                    ->whereNull('information_types.deleted_at');
            })
            ->Join('information_recommends', function ($join) {
                $join->on('informations.id', '=', 'information_recommends.information_id');
            })
            ->where('informations.company_id', $this->getCurrentCompany('id'))
            ->where('informations.store_id', $this->getCurrentStore('id'))
            ->get();
        $productInfo = SettingInformation::where('setting_informations.company_id', $this->getCurrentCompany('id'))
            ->where('setting_informations.store_id', $this->getCurrentStore('id'))
            ->whereNotNull('setting_informations.product_id')
            ->count();
        $storeInfo = SettingInformation::where('setting_informations.company_id', $this->getCurrentCompany('id'))
            ->where('setting_informations.store_id', $this->getCurrentStore('id'))
            ->whereNotNull('setting_informations.information_id')
            ->count();
        $maxDisplay = 4 - $productInfo;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection($listInfo);
        $perPage = SettingSendTabletStore::LIMIT;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $entries = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);
        return view('home.setting_send.list_store')->with(
            [
                'paginate' => $entries,
                'type' => $type,
                'productInfo' => $productInfo,
                'storeInfo' => $storeInfo,
                'maxDisplay' => $maxDisplay
            ]);
    }

    public function getListStoreAjax(Request $request)
    {
        $offset = ($request->get('offset') - 1) * SettingSendTabletStore::LIMIT;
        $type = [0 => "--"] + InformationType::whereNull('information_types.deleted_at')->lists('type_content', 'id')->toArray();
        $listInfo = Information::select('informations.*', 'staffs.first_name', 'staffs.last_name')
            ->leftJoin('staffs', function ($join) {
                $join->on('informations.created_by', '=', 'staffs.id');
            })
            ->Join('information_recommends', function ($join) {
                $join->on('informations.id', '=', 'information_recommends.information_id');
            })
            ->Join('information_types', function ($join) {
                $join->on('informations.infor_type_id', '=', 'information_types.id')
                    ->whereNull('information_types.deleted_at');
            })
            ->where('informations.company_id', $this->getCurrentCompany('id'))
            ->where('informations.store_id', $this->getCurrentStore('id'))
            ->get();
        $listInfo = array_slice($listInfo->toArray(), $offset, SettingSendTabletStore::LIMIT);
        foreach ($listInfo as $k => $value) {
            $listInfo[$k]['created_at'] = date('Y年m月d日', strtotime($listInfo[$k]['created_at'])) . '</br>' . date('H:i', strtotime($listInfo[$k]['created_at']));
            $listInfo[$k]['start_sent_at'] = date('Y年m月d日', strtotime($listInfo[$k]['start_sent_at'])) . '</br>' . date('H:i', strtotime($listInfo[$k]['start_sent_at']));
            $listInfo[$k]['end_sent_at'] = date('Y年m月d日', strtotime($listInfo[$k]['end_sent_at'])) . '</br>' . date('H:i', strtotime($listInfo[$k]['end_sent_at']));
            $listInfo[$k]['content_in'] = $type[$listInfo[$k]['infor_type_id']];
            $listInfo[$k]['is_choise_check'] = ($listInfo[$k]['is_choise'] == 1) ? 'checked' : '';
            $listInfo[$k]['is_target_check'] = ($listInfo[$k]['is_target_store'] == 1) ? 'checked' : '';
            $listInfo[$k]['is_recommend_check'] = ($listInfo[$k]['is_recommend'] == 1) ? 'checked' : '';
            $listInfo[$k]['is_deleted'] = ($listInfo[$k]['deleted_at'] != null) ? 'del' : '';
        }
        return $listInfo;
    }
}
