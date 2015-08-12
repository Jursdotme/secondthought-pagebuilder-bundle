<?php


public function twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret ) {
    require_once 'TwitterAPIExchange.php';

    /** Set access tokens here - see: https://dev.twitter.com/apps/ */
    $settings = array(
        'oauth_access_token'        => $oauth_access_token,
        'oauth_access_token_secret' => $oauth_access_token_secret,
        'consumer_key'              => $consumer_key,
        'consumer_secret'           => $consumer_secret
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = '?screen_name=' . $username . '&count=' . $limit;
    $request_method = 'GET';

    $twitter_instance = new TwitterAPIExchange( $settings );

    $query = $twitter_instance
        ->setGetfield( $getfield )
        ->buildOauth( $url, $request_method )
        ->performRequest();

    $timeline = json_decode($query);

    return $timeline;
}





function tweet_time( $time ) {
    // Get current timestamp.
    $now = strtotime( 'now' );

    // Get timestamp when tweet created.
    $created = strtotime( $time );

    // Get difference.
    $difference = $now - $created;

    // Calculate different time values.
    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $week = $day * 7;

    if ( is_numeric( $difference ) && $difference > 0 ) {

        // If less than 3 seconds.
        if ( $difference < 3 ) {
            return __( 'right now', 'secondthought_pagebuilder_bundle' );
        }

        // If less than minute.
        if ( $difference < $minute ) {
            return floor( $difference ) . ' ' . __( 'seconds ago', 'secondthought_pagebuilder_bundle' );;
        }

        // If less than 2 minutes.
        if ( $difference < $minute * 2 ) {
            return __( 'about 1 minute ago', 'secondthought_pagebuilder_bundle' );
        }

        // If less than hour.
        if ( $difference < $hour ) {
            return floor( $difference / $minute ) . ' ' . __( 'minutes ago', 'secondthought_pagebuilder_bundle' );
        }

        // If less than 2 hours.
        if ( $difference < $hour * 2 ) {
            return __( 'about 1 hour ago', 'secondthought_pagebuilder_bundle' );
        }

        // If less than day.
        if ( $difference < $day ) {
            return floor( $difference / $hour ) . ' ' . __( 'hours ago', 'secondthought_pagebuilder_bundle' );
        }

        // If more than day, but less than 2 days.
        if ( $difference > $day && $difference < $day * 2 ) {
            return __( 'yesterday', 'secondthought_pagebuilder_bundle' );;
        }

        // If less than year.
        if ( $difference < $day * 365 ) {
            return floor( $difference / $day ) . ' ' . __( 'days ago', 'secondthought_pagebuilder_bundle' );
        }

        // Else return more than a year.
        return __( 'over a year ago', 'secondthought_pagebuilder_bundle' );
    }
}

$title                     = apply_filters( 'widget_title', $instance['title'] );
$username                  = $instance['twitter_username'];
$limit                     = $instance['update_count'];

echo $args['before_widget'];

if ( ! empty( $title ) ) {
    echo $args['before_title'] . $title . $args['after_title'];
}

// Get the tweets.
$timelines = $this->twitter_timeline( $username, $limit, $oauth_access_token, $oauth_access_token_secret, $consumer_key, $consumer_secret );

if ( $timelines ) {

    // Add links to URL and username mention in tweets.
    $patterns = array( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', '/@([A-Za-z0-9_]{1,15})/' );
    $replace = array( '<a href="$1">$1</a>', '<a href="http://twitter.com/$1">@$1</a>' );

    foreach ( $timelines as $timeline ) {
        $result = preg_replace( $patterns, $replace, $timeline->text );

        echo '<div>';
            echo $result . '<br/>';
            echo $this->tweet_time( $timeline->created_at );
        echo '</div>';
        echo '<br/>';
    }

} else {
    _e( 'Error fetching feeds. Please verify the Twitter settings in the widget.', 'secondthought_pagebuilder_bundle' );
}

echo $args['after_widget'];
