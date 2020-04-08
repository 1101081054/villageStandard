<?php
function Json($data = null, $msg = '', $code = 2000){
    $content = array(
        'code' => $code,
        'data' => $data,
        'msg' => $msg
    );
    return response()->json($content);
}
