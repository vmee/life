<?php
/**
 * Films model config
 */
return array(
    'title' => '群组管理',
    'single' => 'groups',
    'model' => 'Groups',
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'name',
        'permissions' => array(
            'title' => '权限',
            'output' => function($value){

                    $keyArr = json_decode($value, true);
                    $permissionsNames = array('administrator'=>'所有权限','user'=>'注册用户');
                    $output = '';
                    if(!is_array($keyArr)) return $value;
                    foreach($keyArr as $k=>$v){
                        if($v) $output .= $permissionsNames[$k].' ';
                    }

                    return $output;
                }
        ),
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'name',

    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'name',
        'permissions' => array(
            'type' => 'enum',
            'title' => '权限',
            'options' => array(
                'administrator'=>'所有权限',
                'user'=>'普通用户',
            ),
        ),

    ),

    /**
     * This is run prior to saving the JSON form data
     *
     * @type function
     * @param array     $data
     *
     * @return string (on error) / void (otherwise)
     */
    'before_save' => function(&$data)
    {
        $data['permissions'] = json_encode(array($data['permissions']=>1));
    },
);