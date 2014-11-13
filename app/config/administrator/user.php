<?php
/**
 * Films model config
 */
return array(
    'title' => '用户管理',
    'single' => 'user',
    'model' => 'Users',

    'rules' => array(
        'first_name' => 'required|max:32',
        'email' => 'required|email',
    ),
    /**
     * The display columns
     */
    'columns' => array(
        'id',
        'first_name',
        'email',
        'groups'=>array(
            'title' => '用户组',
            'relationship' => 'groups',
            'select' => "(:table).name"
        ),
        /*
        'release_date' => array(
            'title' => 'release date'
        ),
        'director_name' => array(
            'title' => 'Director Name',
            'relationship' => 'director',
            'select' => "CONCAT((:table).first_name, ' ', (:table).last_name)"
        ),
        'num_actors' => array(
            'title' => '# Actors',
            'relationship' => 'actors',
            'select' => "COUNT((:table).id)"
        ),
        'box_office' => array(
            'title' => 'Box Office',
            'relationship' => 'boxOffice',
            'select' => "CONCAT('$', FORMAT(SUM((:table).revenue), 2))"
        ),
        */
    ),
    /**
     * The filter set
     */
    'filters' => array(
        'id',
        'first_name',
        'email',
        'groups' => array(
            'title' => '用户组',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "name",
        ),
        'activated' => array(
            'type' => 'bool',
            'title' => '激活',
            'value' => true,
        )
        /*
        'release_date' => array(
            'title' => 'Release Date',
            'type' => 'date',
            'date_format' => 'yy-mm-dd',
        ),
        'director' => array(
            'title' => 'Director',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
        ),
        'actors' => array(
            'title' => 'Actors',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
        ),*/
    ),
    /**
     * The editable fields
     */
    'edit_fields' => array(
        'first_name',
        'email',
        'password' => array(
            'type' => 'password',
            'title' => 'Password',
        ),
        'groups' => array(
            'title' => '用户组',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "name",
        ),
        'activated' => array(
            'type' => 'bool',
            'title' => '激活',
            'value' => true,
        )

        /*
        'release_date' => array(
            'title' => 'Release Date',
            'type' => 'date',
            'date_format' => 'yy-mm-dd',
        ),
        'director' => array(
            'title' => 'Director',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
        ),
        'actors' => array(
            'title' => 'Actors',
            'type' => 'relationship',
            'name_field' => 'name',
            'options_sort_field' => "CONCAT(first_name, ' ' , last_name)",
        ),
        'theaters' => array(
            'title' => 'Theater',
            'type' => 'relationship',
            'name_field' => 'name',
        ),*/
    ),
);