<?php

/**
 *
 * @see XenForo_Model_Thread
 */
class ThemeHouse_MasterForums_Extend_XenForo_Model_Thread extends XFCP_ThemeHouse_MasterForums_Extend_XenForo_Model_Thread
{

    /**
     *
     * @see XenForo_Model_Thread::prepareThreadConditions()
     */
    public function prepareThreadConditions(array $conditions, array &$fetchOptions)
    {
        $xenOptions = XenForo_Application::get('options');

        if (!empty($conditions['forum_id']) && empty($conditions['node_id'])) {
            $conditions['node_id'] = $conditions['forum_id'];
        }

        if (!empty($conditions['node_id'])) {
            if (!is_array($conditions['node_id']) &&
                 $conditions['node_id'] == $xenOptions->th_masterForums_masterForumId) {
                $conditions['node_id'] = $xenOptions->th_masterForums_feederForumIds;
            }
        }

        $sqlConditions[] = parent::prepareThreadConditions($conditions, $fetchOptions);

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareThreadConditions */
}