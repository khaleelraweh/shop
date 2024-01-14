<?php

//web menus Categories

use App\Models\Permission;

//AccountSettings
//  $manageAccountSettings = Permission::create(['name' => 'manage_account_settings', 'display_name' => 'إدارة الحسابات' , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.index' , 'icon' => 'fas fa-user' , 'parent' => $manageCustomers->id , 'parent_original' => '0' , 'parent_show' => $manageCustomers->id  , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '60',] );
//  $manageAccountSettings->parent_show = $manageAccountSettings->id; $manageAccountSettings->save();
//  $showAccountSettings   =  Permission::create(['name' => 'show_account_settings'      , 'display_name'    => 'الحسابات'       , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.account_settings'    , 'icon' => 'fas fa-user'     , 'parent' => $manageAccountSettings->id , 'parent_original' => $manageAccountSettings->id ,'parent_show' => $manageAccountSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
//  $updateAccountSettings  =  Permission::create(['name' => 'update_account_settings'   , 'display_name'    => 'تعديل حساب' , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.edit'     , 'icon' => null              , 'parent' => $manageAccountSettings->id , 'parent_original' => $manageAccountSettings->id ,'parent_show' => $manageAccountSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );




// Account Settings
$manageAccountSettings = Permission::create(['name' => 'manage_account_settings', 'display_name' => 'إدارة الحسابات' , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.account_settings' , 'icon' => 'fas fa-user' , 'parent' => '0', 'parent_original' => '0' , 'parent_show' => '0'  , 'sidebar_link' => '1' , 'appear' => '1' , 'ordering' => '1000',] );
$manageAccountSettings->parent_show = $manageAccountSettings->id; $manageAccountSettings->save();

$showAccountSettings    =  Permission::create(['name' => 'show_account_settings'    ,  'display_name' => 'إدارة الحساب'      , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.account_settings'    , 'icon' => 'fas fa-calculator' , 'parent' => $manageAccountSettings->id , 'parent_original' => $manageAccountSettings->id ,'parent_show' => $manageAccountSettings->id , 'sidebar_link' => '1' , 'appear' => '1'] );
$displayAccountSettings =  Permission::create(['name' => 'display_account_settings' , 'display_name'  => 'عرض الحساب '   , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.show'     , 'icon' => null                  , 'parent' => $manageAccountSettings->id , 'parent_original' => $manageAccountSettings->id ,'parent_show' => $manageAccountSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );
$updateAccountSettings  =  Permission::create(['name' => 'update_account_settings'  , 'display_name'  => 'تعديل الحساب   ' , 'route' => 'account_settings' , 'module' => 'account_settings' , 'as' => 'account_settings.edit'     , 'icon' => null                  , 'parent' => $manageAccountSettings->id , 'parent_original' => $manageAccountSettings->id ,'parent_show' => $manageAccountSettings->id , 'sidebar_link' => '0' , 'appear' => '0'] );

