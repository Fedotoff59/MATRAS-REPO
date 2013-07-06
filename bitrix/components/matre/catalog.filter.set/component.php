<?        
    /* START 1 PART OF SMART FILTER */
    global $arSmartFilter;
    // Start matrebasefilter
    if(isset($_POST['matrebase']) && ($_POST['matrebase'] != 'Не важно')) {
        $arSmartFilter['PROPERTY']['MATREBASE_VALUE'] = $_POST['matrebase'];
    }
    // Start Brand Filter
    $arBFilter = Array('IBLOCK_ID' => 7, 'ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(false, $arBFilter, true);
    while($ar_trademarks = $db_list->GetNext())
    {
        $TID = $ar_trademarks["ID"];
        if(isset($_POST['brand_'.$TID]) && $_POST['brand_'.$TID] == 'on')
            $arBrandFilter[] = $TID;
    }
    $arSmartFilter['PROPERTY']['TRADEMARK'] = $arBrandFilter;
    /** END SMART FILTER  **/
?>