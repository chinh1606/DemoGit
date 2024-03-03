<?php
if(!function_exists("testHelpers")) {
    function testHelpers($categories, $parent, $char) {
        foreach ($categories as $category) {
            if($category["parent"]==$parent) {
                echo $char.$category["name"]."<br>";
                $new_parent = $category["id"];
                testHelpers($categories, $new_parent, $char."|--");
            }
        }
    }
}
?>
