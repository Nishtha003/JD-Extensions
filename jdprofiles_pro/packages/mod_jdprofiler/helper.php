
<?php
/**
 * @package	JD profile Showcase
 * @subpackage  mod_jdprofiler
 * @author	Joomdev.com
 * @copyright	Copyright (C) 2008 - 2018 Joomdev.com. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
$doc = JFactory::getDocument();
// Style Sheet
$doc->addStyleSheet(JURI::root().'media/mod_jdprofiler/assets/css/jd-profile-style.css');
// Style Sheet
class modJdprofilerHelper {
    public function profiles($team,$limit,$designation){
        // Get a db connection.
        $db = JFactory::getDbo();

        // Create a new query object.
        $query = $db->getQuery(true);

        //  query

        $query
            ->select(array('a.*', 'b.title'))
            ->from($db->quoteName('#__jdprofiler_profiles', 'a'))
            ->join('INNER', $db->quoteName('#__jdprofiler_designation', 'b') . ' ON (' . $db->quoteName('a.designation') . ' = ' . $db->quoteName('b.id') . ')')
            ->Where($db->quoteName('a.state') . ' = '. $db->quote(1))
            ->Where($db->quoteName('a.team') . ' = '. $db->quote($team))
            ->Where($db->quoteName('a.designation') . ' = '. $db->quote($designation))
            ->order('id DESC')
            ->setLimit($limit);
            // Reset the query using our newly populated query object.
            $db->setQuery($query);

             // Load the results as a list of stdClass objects (see later for more options on retrieving data).
            $results = $db->loadObjectList();
        return $results;
    }
}
