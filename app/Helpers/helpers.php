<?php
if(!function_exists("showCategories")) {
    function showCategories($categories, $parent, $char, $parent_id_child) {
        foreach($categories as $category) {
            if($category["parent"]==$parent) {
                if($parent_id_child == $category["id"]) {
                    echo "<option value='".$category['id']."'selected>".$char.$category["name"]."</option>";
                }else{
                    echo "<option value='".$category['id']."'>".$char.$category["name"]."</option>";
                }
                showCategories($categories, $category["id"], $char."|--", $parent_id_child);
            }
        }
    }
}
?>
