<?
print_r($_POST);
if($REQUEST_METHOD=="POST" && strlen($Update)>0 && $view!="Y" && (!$error) && empty($dontsave)):
    if($_POST['PROP'][38]['n0']['VALUE'] > 0) {
        $SID = $_POST['PROP'][21][0];
        $COLLECTION_ID = $_POST['PROP'][38]['n0']['VALUE'];
        $db_old_groups = CIBlockElement::GetElementGroups($COLLECTION_ID, true);
        $ar_group = $db_old_groups->Fetch();
        if ($ar_group["ID"] != $SID)
            $error = new _CIBlockError(2, 'COLLECTION_REQUIRED', 'Выбранная коллекция не соответствует торговой марке.');
    }
endif;
?>
