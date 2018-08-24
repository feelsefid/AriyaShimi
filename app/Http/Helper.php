<?php
/**
 * Created by PhpStorm.
 * User: Programmer2
 * Date: 5/25/18
 * Time: 8:45 PM
 */

function exists_module($position) {
    $exists = \App\Models\Module::where('status', 1)->where('position', $position)->count();
    if($exists > 0)
        return true;

    return false;
}

function buildTree(Array $data, $parent = 0) {
    $tree = array();
    foreach ($data as $d) {
        if ($d['parent_id'] == $parent) {
            $children = buildTree($data, $d['id']);
            // set a trivial key
            if (!empty($children)) {
                $d['_children'] = $children;
            }
            $tree[] = $d;
        }
    }
    return $tree;
}

function DropDownTreeOptions($tree, $r = 0, $p = null, $id = null) {
    foreach ($tree as $i => $t) {
        $dash = ($t['parent_id'] == 0) ? '' : str_repeat('|--', $r) .' ';
        if($id != null && $id == $t['id']) {
            printf("\t<option value='%d' selected>%s%s</option>\n", $t['id'], $dash, $t['name']);
        } else {
            printf("\t<option value='%d'>%s%s</option>\n", $t['id'], $dash, $t['name']);
        }
        if ($t['parent_id'] == $p) {
            // reset $r
            $r = 0;
        }
        $r++;
        if (isset($t['_children'])) {
            DropDownTreeOptions($t['_children'], ++$r, $t['parent_id']);
        }
    }
}