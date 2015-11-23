<?php

class ThemeHouse_MasterForums_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_MasterForums' => array(
                'model' => array(
                    'XenForo_Model_Thread'
                ), /* END 'model' */
            ), /* END 'ThemeHouse_MasterForums' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $loadClassModel = new ThemeHouse_MasterForums_Listener_LoadClass($class, $extend, 'model');
        $extend = $loadClassModel->run();
    } /* END loadClassModel */
}