<?
// �������� �������
if (CModule::IncludeModule("iblock") && CModule::IncludeModule("catalog")):
        $SKUProps = CSKUProps::GetSKUProps();
        $arResult['FORMAT_SIZSES'] = array_unique($SKUProps['FORMAT_SIZES']);
        asort($arResult['FORMAT_SIZSES']);
        if(isset($_GET['size']) && ($_GET['size'] != ''))
            foreach($arResult['FORMAT_SIZSES'] as $flag => $Size) 
                if($_GET['size'] == $Size)
                    $arResult['SELECTED_SIZE'] = $flag;
        $arResult['MAX_PRICE'] = max($SKUProps['PRICES']);
        $arResult['FORMATED_MAX_PRICE'] = IntVal($arResult['MAX_PRICE'] - 0.05 * $arResult['MAX_PRICE']);
        $arResult['MIN_PRICE'] = min($SKUProps['PRICES']);
        $arResult['FORMATED_MIN_PRICE'] = IntVal($arResult['MIN_PRICE'] + 0.15 * $arResult['MIN_PRICE']);
        if(isset($_GET['max_price']) && (IntVal($_GET['max_price']) <= $arResult['MAX_PRICE']) && isset($_GET['min_price']) && (IntVal($_GET['min_price']) >= $arResult['MIN_PRICE']))
            if((IntVal($_GET['min_price']) >= $arResult['MIN_PRICE']) && 
               (IntVal($_GET['min_price']) < $arResult['MAX_PRICE']) && 
               (IntVal($_GET['min_price']) <= IntVal($_GET['max_price'])) && 
               (IntVal($_GET['max_price']) <= $arResult['MAX_PRICE'])) {
                $arResult['FORMATED_MAX_PRICE'] = $_GET['max_price'];
                $arResult['FORMATED_MIN_PRICE'] = $_GET['min_price'];
            }   
        $arSecFilter = Array('IBLOCK_ID' => 7, 'ACTIVE'=>'Y');
        $db_list = CIBlockSection::GetList(false, $arSecFilter, true);
        while($ar_trademarks = $db_list->GetNext())
        {
            $TID = $ar_trademarks["ID"];
            $arTrademarks[$TID] = $ar_trademarks['NAME'];
            if(isset($_GET['brand_'.$TID]) && $_GET['brand_'.$TID] == 'on')
                    $arResult['CHECKED_BARNDS'][$TID] = 'checked';
                    else $arResult['CHECKED_BARNDS'][$TID] = '';
        }
        $arResult['TRADEMARKS'] = $arTrademarks;
        $property_enums = CIBlockPropertyEnum::GetList(Array("DEF"=>"DESC", "SORT"=>"ASC"), Array("IBLOCK_ID"=>6, "CODE"=>"MATREBASE"));
        while($enum_fields = $property_enums->GetNext())
        {
            $PID = $enum_fields["ID"];
            $base_value[$PID] = $enum_fields["VALUE"];
            if(isset($_GET['matrebase']) && $_GET['matrebase'] != '')
                if($_GET['matrebase'] == $enum_fields["VALUE"])
                    $arResult['SELECTED_BASE'] = $PID;
        }
        $arResult['MATREBASE'] = $base_value;
        asort($arResult['MATREBASE']);
        //echo '<pre>'; print_r($_GET); echo '</pre>';
        //echo '<pre>'; print_r($_POST); echo '</pre>';
        //echo '<pre>'; print_r($arResult); echo '</pre>';
        $this->IncludeComponentTemplate();
endif;
?>
