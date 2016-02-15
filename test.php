<?php function ai1ec_cl_get_upcoming_events( Ai1ec_Registry_Object $registry ) {

  global $cleventlist;

  $date_system = $registry->get( 'date.system' );
  $search = $registry->get('model.search');

  $local_date = $registry
      ->get( 'date.time', $date_system->current_time(), 'sys.default' );

  $start_time = clone $local_date;
  $start_time->set_date(
    $local_date->format( 'Y' ),
    $local_date->format( 'm' ),
    1
  )->set_time( 0, 0, 0 );
  $end_time = clone $start_time;
  $end_time->adjust_month( 12 );

  $month_events = $search->get_events_between(
    $start_time,
    $end_time,
    array(),
    true
  );

  //loop through results to get event_ids
  $cleventlist  = array();
  foreach ($month_events  as  $event) {

      $related_post_id_raw  = get_post_meta($event->get('post_id'), 'event_poster_ref');
      // //Sanitize the first value of the return
      $related_post_id  = isset($related_post_id_raw[0][0]) &&  $related_post_id_raw[0][0]  > 0 ? $related_post_id_raw[0][0]  : 0;


      // // Add the ID to the list of ones we've already counted
      // // Exclude the current post
      if  (!in_array($related_post_id,  $cleventlist) &&  $related_post_id  !=  $post->ID &&  $related_post_id  !=  0)  {
          $cleventlist[]  = $related_post_id;
      }
  }

}
add_action( 'ai1ec_loaded', 'ai1ec_cl_get_upcoming_events', 9 );

?>
