<?        
    /* START 1 PART OF SMART FILTER */
    global $arSmartFilter;
    // Start matrebasefilter
    if(isset($_GET['matrebase']) && ($_GET['matrebase'] != 'Неважно')) {
        $arSmartFilter['PROPERTY']['MATREBASE_VALUE'] = $_GET['matrebase'];
    }
    // Start Brand Filter
    $arBFilter = Array('IBLOCK_ID' => 7, 'ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(false, $arBFilter, true);
    while($ar_trademarks = $db_list->GetNext())
    {
        $TID = $ar_trademarks["ID"];
        if(isset($_GET['brand_'.$TID]) && $_GET['brand_'.$TID] == 'on')
            $arBrandFilter[] = $TID;
    }
    $arSmartFilter['PROPERTY']['TRADEMARK'] = $arBrandFilter;
    /** END SMART FILTER  **/
?>