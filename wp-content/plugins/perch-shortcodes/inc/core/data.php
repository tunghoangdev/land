<?php
/**
 * Class for managing plugin data
 */
class Tp_Data {

	/**
	 * Constructor
	 */
	function __construct() {}

	/**
	 * Shortcode groups
	 */
	public static function groups() {
		return apply_filters( 'perch/data/groups', array(
				'all'     => __( 'All', 'perch' ),
				'content' => __( 'Content', 'perch' ),
				'box'     => __( 'Box', 'perch' ),
				'media'   => __( 'Media', 'perch' ),
				'gallery' => __( 'Gallery', 'perch' ),
				'data'    => __( 'Data', 'perch' ),
				'other'   => __( 'Other', 'perch' )
			) );
	}

	/**
	 * Border styles
	 */
	public static function borders() {
		return apply_filters( 'perch/data/borders', array(
				'none'   => __( 'None', 'perch' ),
				'solid'  => __( 'Solid', 'perch' ),
				'dotted' => __( 'Dotted', 'perch' ),
				'dashed' => __( 'Dashed', 'perch' ),
				'double' => __( 'Double', 'perch' ),
				'groove' => __( 'Groove', 'perch' ),
				'ridge'  => __( 'Ridge', 'perch' )
			) );
	}

	/**
	 * Font-Awesome icons
	 */
	public static function icons() {
		return apply_filters( 'perch/data/icons', 
			array(
				'Generic-icons' => array( 'genericon genericon-404', 'genericon genericon-activity', 'genericon genericon-anchor', 'genericon genericon-aside', 'genericon genericon-attachment', 'genericon genericon-audio', 'genericon genericon-bold', 'genericon genericon-book', 'genericon genericon-bug', 'genericon genericon-cart', 'genericon genericon-category', 'genericon genericon-chat', 'genericon genericon-checkmark', 'genericon genericon-close', 'genericon genericon-close-alt', 'genericon genericon-cloud', 'genericon genericon-cloud-download', 'genericon genericon-cloud-upload', 'genericon genericon-code', 'genericon genericon-codepen', 'genericon genericon-cog', 'genericon genericon-collapse', 'genericon genericon-comment', 'genericon genericon-day', 'genericon genericon-digg', 'genericon genericon-document', 'genericon genericon-dot', 'genericon genericon-downarrow', 'genericon genericon-download', 'genericon genericon-draggable', 'genericon genericon-dribbble', 'genericon genericon-dropbox', 'genericon genericon-dropdown', 'genericon genericon-dropdown-left', 'genericon genericon-edit', 'genericon genericon-ellipsis', 'genericon genericon-expand', 'genericon genericon-external', 'genericon genericon-facebook', 'genericon genericon-facebook-alt', 'genericon genericon-fastforward', 'genericon genericon-feed', 'genericon genericon-flag', 'genericon genericon-flickr', 'genericon genericon-foursquare', 'genericon genericon-fullscreen', 'genericon genericon-gallery', 'genericon genericon-github', 'genericon genericon-googleplus', 'genericon genericon-googleplus-alt', 'genericon genericon-handset', 'genericon genericon-heart', 'genericon genericon-help', 'genericon genericon-hide', 'genericon genericon-hierarchy', 'genericon genericon-home', 'genericon genericon-image', 'genericon genericon-info', 'genericon genericon-instagram', 'genericon genericon-italic', 'genericon genericon-key', 'genericon genericon-leftarrow', 'genericon genericon-link', 'genericon genericon-linkedin', 'genericon genericon-linkedin-alt', 'genericon genericon-location', 'genericon genericon-lock', 'genericon genericon-mail', 'genericon genericon-maximize', 'genericon genericon-menu', 'genericon genericon-microphone', 'genericon genericon-minimize', 'genericon genericon-minus', 'genericon genericon-month', 'genericon genericon-move', 'genericon genericon-next', 'genericon genericon-notice', 'genericon genericon-paintbrush', 'genericon genericon-path', 'genericon genericon-pause', 'genericon genericon-phone', 'genericon genericon-picture', 'genericon genericon-pinned', 'genericon genericon-pinterest', 'genericon genericon-pinterest-alt', 'genericon genericon-play', 'genericon genericon-plugin', 'genericon genericon-plus', 'genericon genericon-pocket', 'genericon genericon-polldaddy', 'genericon genericon-portfolio', 'genericon genericon-previous', 'genericon genericon-print', 'genericon genericon-quote', 'genericon genericon-rating-empty', 'genericon genericon-rating-full', 'genericon genericon-rating-half', 'genericon genericon-reddit', 'genericon genericon-refresh', 'genericon genericon-reply', 'genericon genericon-reply-alt', 'genericon genericon-reply-single', 'genericon genericon-rewind', 'genericon genericon-rightarrow', 'genericon genericon-search', 'genericon genericon-send-to-phone', 'genericon genericon-send-to-tablet', 'genericon genericon-share', 'genericon genericon-show', 'genericon genericon-shuffle', 'genericon genericon-sitemap', 'genericon genericon-skip-ahead', 'genericon genericon-skip-back', 'genericon genericon-skype', 'genericon genericon-spam', 'genericon genericon-spotify', 'genericon genericon-standard', 'genericon genericon-star', 'genericon genericon-status', 'genericon genericon-stop', 'genericon genericon-stumbleupon', 'genericon genericon-subscribe', 'genericon genericon-subscribed', 'genericon genericon-summary', 'genericon genericon-tablet', 'genericon genericon-tag', 'genericon genericon-time', 'genericon genericon-top', 'genericon genericon-trash', 'genericon genericon-tumblr', 'genericon genericon-twitch', 'genericon genericon-twitter', 'genericon genericon-unapprove', 'genericon genericon-unsubscribe', 'genericon genericon-unzoom', 'genericon genericon-uparrow', 'genericon genericon-user', 'genericon genericon-video', 'genericon genericon-videocamera', 'genericon genericon-vimeo', 'genericon genericon-warning', 'genericon genericon-website', 'genericon genericon-week', 'genericon genericon-wordpress', 'genericon genericon-xpost', 'genericon genericon-youtube', 'genericon genericon-zoom',  ),
				
				'Iconic-icons' => array( 'ion-ionic', 'ion-arrow-up-a', 'ion-arrow-right-a', 'ion-arrow-down-a', 'ion-arrow-left-a', 'ion-arrow-up-b', 'ion-arrow-right-b', 'ion-arrow-down-b', 'ion-arrow-left-b', 'ion-arrow-up-c', 'ion-arrow-right-c', 'ion-arrow-down-c', 'ion-arrow-left-c', 'ion-arrow-return-right', 'ion-arrow-return-left', 'ion-arrow-swap', 'ion-arrow-shrink', 'ion-arrow-expand', 'ion-arrow-move', 'ion-arrow-resize', 'ion-chevron-up', 'ion-chevron-right', 'ion-chevron-down', 'ion-chevron-left', 'ion-navicon-round', 'ion-navicon', 'ion-drag', 'ion-log-in', 'ion-log-out', 'ion-checkmark-round', 'ion-checkmark', 'ion-checkmark-circled', 'ion-close-round', 'ion-close', 'ion-close-circled', 'ion-plus-round', 'ion-plus', 'ion-plus-circled', 'ion-minus-round', 'ion-minus', 'ion-minus-circled', 'ion-information', 'ion-information-circled', 'ion-help', 'ion-help-circled', 'ion-backspace-outline', 'ion-backspace', 'ion-help-buoy', 'ion-asterisk', 'ion-alert', 'ion-alert-circled', 'ion-refresh', 'ion-loop', 'ion-shuffle', 'ion-home', 'ion-search', 'ion-flag', 'ion-star', 'ion-heart', 'ion-heart-broken', 'ion-gear-a', 'ion-gear-b', 'ion-toggle-filled', 'ion-toggle', 'ion-settings', 'ion-wrench', 'ion-hammer', 'ion-edit', 'ion-trash-a', 'ion-trash-b', 'ion-document', 'ion-document-text', 'ion-clipboard', 'ion-scissors', 'ion-funnel', 'ion-bookmark', 'ion-email', 'ion-email-unread', 'ion-folder', 'ion-filing', 'ion-archive', 'ion-reply', 'ion-reply-all', 'ion-forward', 'ion-share', 'ion-paper-airplane', 'ion-link', 'ion-paperclip', 'ion-compose', 'ion-briefcase', 'ion-medkit', 'ion-at', 'ion-pound', 'ion-quote', 'ion-cloud', 'ion-upload', 'ion-more', 'ion-grid', 'ion-calendar', 'ion-clock', 'ion-compass', 'ion-pinpoint', 'ion-pin', 'ion-navigate', 'ion-location', 'ion-map', 'ion-lock-combination', 'ion-locked', 'ion-unlocked', 'ion-key', 'ion-arrow-graph-up-right', 'ion-arrow-graph-down-right', 'ion-arrow-graph-up-left', 'ion-arrow-graph-down-left', 'ion-stats-bars', 'ion-connection-bars', 'ion-pie-graph', 'ion-chatbubble', 'ion-chatbubble-working', 'ion-chatbubbles', 'ion-chatbox', 'ion-chatbox-working', 'ion-chatboxes', 'ion-person', 'ion-person-add', 'ion-person-stalker', 'ion-woman', 'ion-man', 'ion-female', 'ion-male', 'ion-transgender', 'ion-fork', 'ion-knife', 'ion-spoon', 'ion-soup-can-outline', 'ion-soup-can', 'ion-beer', 'ion-wineglass', 'ion-coffee', 'ion-icecream', 'ion-pizza', 'ion-power', 'ion-mouse', 'ion-battery-full', 'ion-battery-half', 'ion-battery-low', 'ion-battery-empty', 'ion-battery-charging', 'ion-wifi', 'ion-bluetooth', 'ion-calculator', 'ion-camera', 'ion-eye', 'ion-eye-disabled', 'ion-flash', 'ion-flash-off', 'ion-qr-scanner', 'ion-image', 'ion-images', 'ion-wand', 'ion-contrast', 'ion-aperture', 'ion-crop', 'ion-easel', 'ion-paintbrush', 'ion-paintbucket', 'ion-monitor', 'ion-laptop', 'ion-ipad', 'ion-iphone', 'ion-ipod', 'ion-printer', 'ion-usb', 'ion-outlet', 'ion-bug', 'ion-code', 'ion-code-working', 'ion-code-download', 'ion-fork-repo', 'ion-network', 'ion-pull-request', 'ion-merge', 'ion-xbox', 'ion-playstation', 'ion-steam', 'ion-closed-captioning', 'ion-videocamera', 'ion-film-marker', 'ion-disc', 'ion-headphone', 'ion-music-note', 'ion-radio-waves', 'ion-speakerphone', 'ion-mic-a', 'ion-mic-b', 'ion-mic-c', 'ion-volume-high', 'ion-volume-medium', 'ion-volume-low', 'ion-volume-mute', 'ion-levels', 'ion-play', 'ion-pause', 'ion-stop', 'ion-record', 'ion-skip-forward', 'ion-skip-backward', 'ion-eject', 'ion-bag', 'ion-card', 'ion-cash', 'ion-pricetag', 'ion-pricetags', 'ion-thumbsup', 'ion-thumbsdown', 'ion-happy-outline', 'ion-happy', 'ion-sad-outline', 'ion-sad', 'ion-bowtie', 'ion-tshirt-outline', 'ion-tshirt', 'ion-trophy', 'ion-podium', 'ion-ribbon-a', 'ion-ribbon-b', 'ion-university', 'ion-magnet', 'ion-beaker', 'ion-erlenmeyer-flask', 'ion-egg', 'ion-earth', 'ion-planet', 'ion-lightbulb', 'ion-cube', 'ion-leaf', 'ion-waterdrop', 'ion-flame', 'ion-fireball', 'ion-bonfire', 'ion-umbrella', 'ion-nuclear', 'ion-no-smoking', 'ion-thermometer', 'ion-speedometer', 'ion-model-s', 'ion-plane', 'ion-jet', 'ion-load-a', 'ion-load-b', 'ion-load-c', 'ion-load-d', 'ion-ios-ionic-outline', 'ion-ios-arrow-back', 'ion-ios-arrow-forward', 'ion-ios-arrow-up', 'ion-ios-arrow-right', 'ion-ios-arrow-down', 'ion-ios-arrow-left', 'ion-ios-arrow-thin-up', 'ion-ios-arrow-thin-right', 'ion-ios-arrow-thin-down', 'ion-ios-arrow-thin-left', 'ion-ios-circle-filled', 'ion-ios-circle-outline', 'ion-ios-checkmark-empty', 'ion-ios-checkmark-outline', 'ion-ios-checkmark', 'ion-ios-plus-empty', 'ion-ios-plus-outline', 'ion-ios-plus', 'ion-ios-close-empty', 'ion-ios-close-outline', 'ion-ios-close', 'ion-ios-minus-empty', 'ion-ios-minus-outline', 'ion-ios-minus', 'ion-ios-information-empty', 'ion-ios-information-outline', 'ion-ios-information', 'ion-ios-help-empty', 'ion-ios-help-outline', 'ion-ios-help', 'ion-ios-search', 'ion-ios-search-strong', 'ion-ios-star', 'ion-ios-star-half', 'ion-ios-star-outline', 'ion-ios-heart', 'ion-ios-heart-outline', 'ion-ios-more', 'ion-ios-more-outline', 'ion-ios-home', 'ion-ios-home-outline', 'ion-ios-cloud', 'ion-ios-cloud-outline', 'ion-ios-cloud-upload', 'ion-ios-cloud-upload-outline', 'ion-ios-cloud-download', 'ion-ios-cloud-download-outline', 'ion-ios-upload', 'ion-ios-upload-outline', 'ion-ios-download', 'ion-ios-download-outline', 'ion-ios-refresh', 'ion-ios-refresh-outline', 'ion-ios-refresh-empty', 'ion-ios-reload', 'ion-ios-loop-strong', 'ion-ios-loop', 'ion-ios-bookmarks', 'ion-ios-bookmarks-outline', 'ion-ios-book', 'ion-ios-book-outline', 'ion-ios-flag', 'ion-ios-flag-outline', 'ion-ios-glasses', 'ion-ios-glasses-outline', 'ion-ios-browsers', 'ion-ios-browsers-outline', 'ion-ios-at', 'ion-ios-at-outline', 'ion-ios-pricetag', 'ion-ios-pricetag-outline', 'ion-ios-pricetags', 'ion-ios-pricetags-outline', 'ion-ios-cart', 'ion-ios-cart-outline', 'ion-ios-chatboxes', 'ion-ios-chatboxes-outline', 'ion-ios-chatbubble', 'ion-ios-chatbubble-outline', 'ion-ios-cog', 'ion-ios-cog-outline', 'ion-ios-gear', 'ion-ios-gear-outline', 'ion-ios-settings', 'ion-ios-settings-strong', 'ion-ios-toggle', 'ion-ios-toggle-outline', 'ion-ios-analytics', 'ion-ios-analytics-outline', 'ion-ios-pie', 'ion-ios-pie-outline', 'ion-ios-pulse', 'ion-ios-pulse-strong', 'ion-ios-filing', 'ion-ios-filing-outline', 'ion-ios-box', 'ion-ios-box-outline', 'ion-ios-compose', 'ion-ios-compose-outline', 'ion-ios-trash', 'ion-ios-trash-outline', 'ion-ios-copy', 'ion-ios-copy-outline', 'ion-ios-email', 'ion-ios-email-outline', 'ion-ios-undo', 'ion-ios-undo-outline', 'ion-ios-redo', 'ion-ios-redo-outline', 'ion-ios-paperplane', 'ion-ios-paperplane-outline', 'ion-ios-folder', 'ion-ios-folder-outline', 'ion-ios-paper', 'ion-ios-paper-outline', 'ion-ios-list', 'ion-ios-list-outline', 'ion-ios-world', 'ion-ios-world-outline', 'ion-ios-alarm', 'ion-ios-alarm-outline', 'ion-ios-speedometer', 'ion-ios-speedometer-outline', 'ion-ios-stopwatch', 'ion-ios-stopwatch-outline', 'ion-ios-timer', 'ion-ios-timer-outline', 'ion-ios-clock', 'ion-ios-clock-outline', 'ion-ios-time', 'ion-ios-time-outline', 'ion-ios-calendar', 'ion-ios-calendar-outline', 'ion-ios-photos', 'ion-ios-photos-outline', 'ion-ios-albums', 'ion-ios-albums-outline', 'ion-ios-camera', 'ion-ios-camera-outline', 'ion-ios-reverse-camera', 'ion-ios-reverse-camera-outline', 'ion-ios-eye', 'ion-ios-eye-outline', 'ion-ios-bolt', 'ion-ios-bolt-outline', 'ion-ios-color-wand', 'ion-ios-color-wand-outline', 'ion-ios-color-filter', 'ion-ios-color-filter-outline', 'ion-ios-grid-view', 'ion-ios-grid-view-outline', 'ion-ios-crop-strong', 'ion-ios-crop', 'ion-ios-barcode', 'ion-ios-barcode-outline', 'ion-ios-briefcase', 'ion-ios-briefcase-outline', 'ion-ios-medkit', 'ion-ios-medkit-outline', 'ion-ios-medical', 'ion-ios-medical-outline', 'ion-ios-infinite', 'ion-ios-infinite-outline', 'ion-ios-calculator', 'ion-ios-calculator-outline', 'ion-ios-keypad', 'ion-ios-keypad-outline', 'ion-ios-telephone', 'ion-ios-telephone-outline', 'ion-ios-drag', 'ion-ios-location', 'ion-ios-location-outline', 'ion-ios-navigate', 'ion-ios-navigate-outline', 'ion-ios-locked', 'ion-ios-locked-outline', 'ion-ios-unlocked', 'ion-ios-unlocked-outline', 'ion-ios-monitor', 'ion-ios-monitor-outline', 'ion-ios-printer', 'ion-ios-printer-outline', 'ion-ios-game-controller-a', 'ion-ios-game-controller-a-outline', 'ion-ios-game-controller-b', 'ion-ios-game-controller-b-outline', 'ion-ios-americanfootball', 'ion-ios-americanfootball-outline', 'ion-ios-baseball', 'ion-ios-baseball-outline', 'ion-ios-basketball', 'ion-ios-basketball-outline', 'ion-ios-tennisball', 'ion-ios-tennisball-outline', 'ion-ios-football', 'ion-ios-football-outline', 'ion-ios-body', 'ion-ios-body-outline', 'ion-ios-person', 'ion-ios-person-outline', 'ion-ios-personadd', 'ion-ios-personadd-outline', 'ion-ios-people', 'ion-ios-people-outline', 'ion-ios-musical-notes', 'ion-ios-musical-note', 'ion-ios-bell', 'ion-ios-bell-outline', 'ion-ios-mic', 'ion-ios-mic-outline', 'ion-ios-mic-off', 'ion-ios-volume-high', 'ion-ios-volume-low', 'ion-ios-play', 'ion-ios-play-outline', 'ion-ios-pause', 'ion-ios-pause-outline', 'ion-ios-recording', 'ion-ios-recording-outline', 'ion-ios-fastforward', 'ion-ios-fastforward-outline', 'ion-ios-rewind', 'ion-ios-rewind-outline', 'ion-ios-skipbackward', 'ion-ios-skipbackward-outline', 'ion-ios-skipforward', 'ion-ios-skipforward-outline', 'ion-ios-shuffle-strong', 'ion-ios-shuffle', 'ion-ios-videocam', 'ion-ios-videocam-outline', 'ion-ios-film', 'ion-ios-film-outline', 'ion-ios-flask', 'ion-ios-flask-outline', 'ion-ios-lightbulb', 'ion-ios-lightbulb-outline', 'ion-ios-wineglass', 'ion-ios-wineglass-outline', 'ion-ios-pint', 'ion-ios-pint-outline', 'ion-ios-nutrition', 'ion-ios-nutrition-outline', 'ion-ios-flower', 'ion-ios-flower-outline', 'ion-ios-rose', 'ion-ios-rose-outline', 'ion-ios-paw', 'ion-ios-paw-outline', 'ion-ios-flame', 'ion-ios-flame-outline', 'ion-ios-sunny', 'ion-ios-sunny-outline', 'ion-ios-partlysunny', 'ion-ios-partlysunny-outline', 'ion-ios-cloudy', 'ion-ios-cloudy-outline', 'ion-ios-rainy', 'ion-ios-rainy-outline', 'ion-ios-thunderstorm', 'ion-ios-thunderstorm-outline', 'ion-ios-snowy', 'ion-ios-moon', 'ion-ios-moon-outline', 'ion-ios-cloudy-night', 'ion-ios-cloudy-night-outline', 'ion-android-arrow-up', 'ion-android-arrow-forward', 'ion-android-arrow-down', 'ion-android-arrow-back', 'ion-android-arrow-dropup', 'ion-android-arrow-dropup-circle', 'ion-android-arrow-dropright', 'ion-android-arrow-dropright-circle', 'ion-android-arrow-dropdown', 'ion-android-arrow-dropdown-circle', 'ion-android-arrow-dropleft', 'ion-android-arrow-dropleft-circle', 'ion-android-add', 'ion-android-add-circle', 'ion-android-remove', 'ion-android-remove-circle', 'ion-android-close', 'ion-android-cancel', 'ion-android-radio-button-off', 'ion-android-radio-button-on', 'ion-android-checkmark-circle', 'ion-android-checkbox-outline-blank', 'ion-android-checkbox-outline', 'ion-android-checkbox-blank', 'ion-android-checkbox', 'ion-android-done', 'ion-android-done-all', 'ion-android-menu', 'ion-android-more-horizontal', 'ion-android-more-vertical', 'ion-android-refresh', 'ion-android-sync', 'ion-android-wifi', 'ion-android-call', 'ion-android-apps', 'ion-android-settings', 'ion-android-options', 'ion-android-funnel', 'ion-android-search', 'ion-android-home', 'ion-android-cloud-outline', 'ion-android-cloud', 'ion-android-download', 'ion-android-upload', 'ion-android-cloud-done', 'ion-android-cloud-circle', 'ion-android-favorite-outline', 'ion-android-favorite', 'ion-android-star-outline', 'ion-android-star-half', 'ion-android-star', 'ion-android-calendar', 'ion-android-alarm-clock', 'ion-android-time', 'ion-android-stopwatch', 'ion-android-watch', 'ion-android-locate', 'ion-android-navigate', 'ion-android-pin', 'ion-android-compass', 'ion-android-map', 'ion-android-walk', 'ion-android-bicycle', 'ion-android-car', 'ion-android-bus', 'ion-android-subway', 'ion-android-train', 'ion-android-boat', 'ion-android-plane', 'ion-android-restaurant', 'ion-android-bar', 'ion-android-cart', 'ion-android-camera', 'ion-android-image', 'ion-android-film', 'ion-android-color-palette', 'ion-android-create', 'ion-android-mail', 'ion-android-drafts', 'ion-android-send', 'ion-android-archive', 'ion-android-delete', 'ion-android-attach', 'ion-android-share', 'ion-android-share-alt', 'ion-android-bookmark', 'ion-android-document', 'ion-android-clipboard', 'ion-android-list', 'ion-android-folder-open', 'ion-android-folder', 'ion-android-print', 'ion-android-open', 'ion-android-exit', 'ion-android-contract', 'ion-android-expand', 'ion-android-globe', 'ion-android-chat', 'ion-android-textsms', 'ion-android-hangout', 'ion-android-happy', 'ion-android-sad', 'ion-android-person', 'ion-android-people', 'ion-android-person-add', 'ion-android-contact', 'ion-android-contacts', 'ion-android-playstore', 'ion-android-lock', 'ion-android-unlock', 'ion-android-microphone', 'ion-android-microphone-off', 'ion-android-notifications-none', 'ion-android-notifications', 'ion-android-notifications-off', 'ion-android-volume-mute', 'ion-android-volume-down', 'ion-android-volume-up', 'ion-android-volume-off', 'ion-android-hand', 'ion-android-desktop', 'ion-android-laptop', 'ion-android-phone-portrait', 'ion-android-phone-landscape', 'ion-android-bulb', 'ion-android-sunny', 'ion-android-alert', 'ion-android-warning', 'ion-social-twitter', 'ion-social-twitter-outline', 'ion-social-facebook', 'ion-social-facebook-outline', 'ion-social-googleplus', 'ion-social-googleplus-outline', 'ion-social-google', 'ion-social-google-outline', 'ion-social-dribbble', 'ion-social-dribbble-outline', 'ion-social-octocat', 'ion-social-github', 'ion-social-github-outline', 'ion-social-instagram', 'ion-social-instagram-outline', 'ion-social-whatsapp', 'ion-social-whatsapp-outline', 'ion-social-snapchat', 'ion-social-snapchat-outline', 'ion-social-foursquare', 'ion-social-foursquare-outline', 'ion-social-pinterest', 'ion-social-pinterest-outline', 'ion-social-rss', 'ion-social-rss-outline', 'ion-social-tumblr', 'ion-social-tumblr-outline', 'ion-social-wordpress', 'ion-social-wordpress-outline', 'ion-social-reddit', 'ion-social-reddit-outline', 'ion-social-hackernews', 'ion-social-hackernews-outline', 'ion-social-designernews', 'ion-social-designernews-outline', 'ion-social-yahoo', 'ion-social-yahoo-outline', 'ion-social-buffer', 'ion-social-buffer-outline', 'ion-social-skype', 'ion-social-skype-outline', 'ion-social-linkedin', 'ion-social-linkedin-outline', 'ion-social-vimeo', 'ion-social-vimeo-outline', 'ion-social-twitch', 'ion-social-twitch-outline', 'ion-social-youtube', 'ion-social-youtube-outline', 'ion-social-dropbox', 'ion-social-dropbox-outline', 'ion-social-apple', 'ion-social-apple-outline', 'ion-social-android', 'ion-social-android-outline', 'ion-social-windows', 'ion-social-windows-outline', 'ion-social-html5', 'ion-social-html5-outline', 'ion-social-css3', 'ion-social-css3-outline', 'ion-social-javascript', 'ion-social-javascript-outline', 'ion-social-angular', 'ion-social-angular-outline', 'ion-social-nodejs', 'ion-social-sass', 'ion-social-python', 'ion-social-chrome', 'ion-social-chrome-outline', 'ion-social-codepen', 'ion-social-codepen-outline', 'ion-social-markdown', 'ion-social-tux', 'ion-social-freebsd-devil', 'ion-social-usd', 'ion-social-usd-outline', 'ion-social-bitcoin', 'ion-social-bitcoin-outline', 'ion-social-yen', 'ion-social-yen-outline', 'ion-social-euro', 'ion-social-euro-outline',  ),

				'linear-icons' => array( 'lnr lnr-home', 'lnr lnr-apartment', 'lnr lnr-pencil', 'lnr lnr-magic-wand', 'lnr lnr-drop', 'lnr lnr-lighter', 'lnr lnr-poop', 'lnr lnr-sun', 'lnr lnr-moon', 'lnr lnr-cloud', 'lnr lnr-cloud-upload', 'lnr lnr-cloud-download', 'lnr lnr-cloud-sync', 'lnr lnr-cloud-check', 'lnr lnr-database', 'lnr lnr-lock', 'lnr lnr-cog', 'lnr lnr-trash', 'lnr lnr-dice', 'lnr lnr-heart', 'lnr lnr-star', 'lnr lnr-star-half', 'lnr lnr-star-empty', 'lnr lnr-flag', 'lnr lnr-envelope', 'lnr lnr-paperclip', 'lnr lnr-inbox', 'lnr lnr-eye', 'lnr lnr-printer', 'lnr lnr-file-empty', 'lnr lnr-file-add', 'lnr lnr-enter', 'lnr lnr-exit', 'lnr lnr-graduation-hat', 'lnr lnr-license', 'lnr lnr-music-note', 'lnr lnr-film-play', 'lnr lnr-camera-video', 'lnr lnr-camera', 'lnr lnr-picture', 'lnr lnr-book', 'lnr lnr-bookmark', 'lnr lnr-user', 'lnr lnr-users', 'lnr lnr-shirt', 'lnr lnr-store', 'lnr lnr-cart', 'lnr lnr-tag', 'lnr lnr-phone-handset', 'lnr lnr-phone', 'lnr lnr-pushpin', 'lnr lnr-map-marker', 'lnr lnr-map', 'lnr lnr-location', 'lnr lnr-calendar-full', 'lnr lnr-keyboard', 'lnr lnr-spell-check', 'lnr lnr-screen', 'lnr lnr-smartphone', 'lnr lnr-tablet', 'lnr lnr-laptop', 'lnr lnr-laptop-phone', 'lnr lnr-power-switch', 'lnr lnr-bubble', 'lnr lnr-heart-pulse', 'lnr lnr-construction', 'lnr lnr-pie-chart', 'lnr lnr-chart-bars', 'lnr lnr-gift', 'lnr lnr-diamond', 'lnr lnr-linearicons', 'lnr lnr-dinner', 'lnr lnr-coffee-cup', 'lnr lnr-leaf', 'lnr lnr-paw', 'lnr lnr-rocket', 'lnr lnr-briefcase', 'lnr lnr-bus', 'lnr lnr-car', 'lnr lnr-train', 'lnr lnr-bicycle', 'lnr lnr-wheelchair', 'lnr lnr-select', 'lnr lnr-earth', 'lnr lnr-smile', 'lnr lnr-sad', 'lnr lnr-neutral', 'lnr lnr-mustache', 'lnr lnr-alarm', 'lnr lnr-bullhorn', 'lnr lnr-volume-high', 'lnr lnr-volume-medium', 'lnr lnr-volume-low', 'lnr lnr-volume', 'lnr lnr-mic', 'lnr lnr-hourglass', 'lnr lnr-undo', 'lnr lnr-redo', 'lnr lnr-sync', 'lnr lnr-history', 'lnr lnr-clock', 'lnr lnr-download', 'lnr lnr-upload', 'lnr lnr-enter-down', 'lnr lnr-exit-up', 'lnr lnr-bug', 'lnr lnr-code', 'lnr lnr-link', 'lnr lnr-unlink', 'lnr lnr-thumbs-up', 'lnr lnr-thumbs-down', 'lnr lnr-magnifier', 'lnr lnr-cross', 'lnr lnr-menu', 'lnr lnr-list', 'lnr lnr-chevron-up', 'lnr lnr-chevron-down', 'lnr lnr-chevron-left', 'lnr lnr-chevron-right', 'lnr lnr-arrow-up', 'lnr lnr-arrow-down', 'lnr lnr-arrow-left', 'lnr lnr-arrow-right', 'lnr lnr-move', 'lnr lnr-warning', 'lnr lnr-question-circle', 'lnr lnr-menu-circle', 'lnr lnr-checkmark-circle', 'lnr lnr-cross-circle', 'lnr lnr-plus-circle', 'lnr lnr-circle-minus', 'lnr lnr-arrow-up-circle', 'lnr lnr-arrow-down-circle', 'lnr lnr-arrow-left-circle', 'lnr lnr-arrow-right-circle', 'lnr lnr-chevron-up-circle', 'lnr lnr-chevron-down-circle', 'lnr lnr-chevron-left-circle', 'lnr lnr-chevron-right-circle', 'lnr lnr-crop', 'lnr lnr-frame-expand', 'lnr lnr-frame-contract', 'lnr lnr-layers', 'lnr lnr-funnel', 'lnr lnr-text-format', 'lnr lnr-text-format-remove', 'lnr lnr-text-size', 'lnr lnr-bold', 'lnr lnr-italic', 'lnr lnr-underline', 'lnr lnr-strikethrough', 'lnr lnr-highlight', 'lnr lnr-text-align-left', 'lnr lnr-text-align-center', 'lnr lnr-text-align-right', 'lnr lnr-text-align-justify', 'lnr lnr-line-spacing', 'lnr lnr-indent-increase', 'lnr lnr-indent-decrease', 'lnr lnr-pilcrow', 'lnr lnr-direction-ltr', 'lnr lnr-direction-rtl', 'lnr lnr-page-break', 'lnr lnr-sort-alpha-asc', 'lnr lnr-sort-amount-asc', 'lnr lnr-hand', 'lnr lnr-pointer-up', 'lnr lnr-pointer-right', 'lnr lnr-pointer-down', 'lnr lnr-pointer-left',  ),
				
				'Font-Awesome-icons' => array( 'fa fa-glass', 'fa fa-music', 'fa fa-search', 'fa fa-envelope-o', 'fa fa-heart', 'fa fa-star', 'fa fa-star-o', 'fa fa-user', 'fa fa-film', 'fa fa-th-large', 'fa fa-th', 'fa fa-th-list', 'fa fa-check', 'fa fa-times', 'fa fa-search-plus', 'fa fa-search-minus', 'fa fa-power-off', 'fa fa-signal', 'fa fa-cog', 'fa fa-trash-o', 'fa fa-home', 'fa fa-file-o', 'fa fa-clock-o', 'fa fa-road', 'fa fa-download', 'fa fa-arrow-circle-o-down', 'fa fa-arrow-circle-o-up', 'fa fa-inbox', 'fa fa-play-circle-o', 'fa fa-repeat', 'fa fa-refresh', 'fa fa-list-alt', 'fa fa-lock', 'fa fa-flag', 'fa fa-headphones', 'fa fa-volume-off', 'fa fa-volume-down', 'fa fa-volume-up', 'fa fa-qrcode', 'fa fa-barcode', 'fa fa-tag', 'fa fa-tags', 'fa fa-book', 'fa fa-bookmark', 'fa fa-print', 'fa fa-camera', 'fa fa-font', 'fa fa-bold', 'fa fa-italic', 'fa fa-text-height', 'fa fa-text-width', 'fa fa-align-left', 'fa fa-align-center', 'fa fa-align-right', 'fa fa-align-justify', 'fa fa-list', 'fa fa-outdent', 'fa fa-indent', 'fa fa-video-camera', 'fa fa-picture-o', 'fa fa-pencil', 'fa fa-map-marker', 'fa fa-adjust', 'fa fa-tint', 'fa fa-pencil-square-o', 'fa fa-share-square-o', 'fa fa-check-square-o', 'fa fa-arrows', 'fa fa-step-backward', 'fa fa-fast-backward', 'fa fa-backward', 'fa fa-play', 'fa fa-pause', 'fa fa-stop', 'fa fa-forward', 'fa fa-fast-forward', 'fa fa-step-forward', 'fa fa-eject', 'fa fa-chevron-left', 'fa fa-chevron-right', 'fa fa-plus-circle', 'fa fa-minus-circle', 'fa fa-times-circle', 'fa fa-check-circle', 'fa fa-question-circle', 'fa fa-info-circle', 'fa fa-crosshairs', 'fa fa-times-circle-o', 'fa fa-check-circle-o', 'fa fa-ban', 'fa fa-arrow-left', 'fa fa-arrow-right', 'fa fa-arrow-up', 'fa fa-arrow-down', 'fa fa-share', 'fa fa-expand', 'fa fa-compress', 'fa fa-plus', 'fa fa-minus', 'fa fa-asterisk', 'fa fa-exclamation-circle', 'fa fa-gift', 'fa fa-leaf', 'fa fa-fire', 'fa fa-eye', 'fa fa-eye-slash', 'fa fa-exclamation-triangle', 'fa fa-plane', 'fa fa-calendar', 'fa fa-random', 'fa fa-comment', 'fa fa-magnet', 'fa fa-chevron-up', 'fa fa-chevron-down', 'fa fa-retweet', 'fa fa-shopping-cart', 'fa fa-folder', 'fa fa-folder-open', 'fa fa-arrows-v', 'fa fa-arrows-h', 'fa fa-bar-chart', 'fa fa-twitter-square', 'fa fa-facebook-square', 'fa fa-camera-retro', 'fa fa-key', 'fa fa-cogs', 'fa fa-comments', 'fa fa-thumbs-o-up', 'fa fa-thumbs-o-down', 'fa fa-star-half', 'fa fa-heart-o', 'fa fa-sign-out', 'fa fa-linkedin-square', 'fa fa-thumb-tack', 'fa fa-external-link', 'fa fa-sign-in', 'fa fa-trophy', 'fa fa-github-square', 'fa fa-upload', 'fa fa-lemon-o', 'fa fa-phone', 'fa fa-square-o', 'fa fa-bookmark-o', 'fa fa-phone-square', 'fa fa-twitter', 'fa fa-facebook', 'fa fa-github', 'fa fa-unlock', 'fa fa-credit-card', 'fa fa-rss', 'fa fa-hdd-o', 'fa fa-bullhorn', 'fa fa-bell', 'fa fa-certificate', 'fa fa-hand-o-right', 'fa fa-hand-o-left', 'fa fa-hand-o-up', 'fa fa-hand-o-down', 'fa fa-arrow-circle-left', 'fa fa-arrow-circle-right', 'fa fa-arrow-circle-up', 'fa fa-arrow-circle-down', 'fa fa-globe', 'fa fa-wrench', 'fa fa-tasks', 'fa fa-filter', 'fa fa-briefcase', 'fa fa-arrows-alt', 'fa fa-users', 'fa fa-link', 'fa fa-cloud', 'fa fa-flask', 'fa fa-scissors', 'fa fa-files-o', 'fa fa-paperclip', 'fa fa-floppy-o', 'fa fa-square', 'fa fa-bars', 'fa fa-list-ul', 'fa fa-list-ol', 'fa fa-strikethrough', 'fa fa-underline', 'fa fa-table', 'fa fa-magic', 'fa fa-truck', 'fa fa-pinterest', 'fa fa-pinterest-square', 'fa fa-google-plus-square', 'fa fa-google-plus', 'fa fa-money', 'fa fa-caret-down', 'fa fa-caret-up', 'fa fa-caret-left', 'fa fa-caret-right', 'fa fa-columns', 'fa fa-sort', 'fa fa-sort-desc', 'fa fa-sort-asc', 'fa fa-envelope', 'fa fa-linkedin', 'fa fa-undo', 'fa fa-gavel', 'fa fa-tachometer', 'fa fa-comment-o', 'fa fa-comments-o', 'fa fa-bolt', 'fa fa-sitemap', 'fa fa-umbrella', 'fa fa-clipboard', 'fa fa-lightbulb-o', 'fa fa-exchange', 'fa fa-cloud-download', 'fa fa-cloud-upload', 'fa fa-user-md', 'fa fa-stethoscope', 'fa fa-suitcase', 'fa fa-bell-o', 'fa fa-coffee', 'fa fa-cutlery', 'fa fa-file-text-o', 'fa fa-building-o', 'fa fa-hospital-o', 'fa fa-ambulance', 'fa fa-medkit', 'fa fa-fighter-jet', 'fa fa-beer', 'fa fa-h-square', 'fa fa-plus-square', 'fa fa-angle-double-left', 'fa fa-angle-double-right', 'fa fa-angle-double-up', 'fa fa-angle-double-down', 'fa fa-angle-left', 'fa fa-angle-right', 'fa fa-angle-up', 'fa fa-angle-down', 'fa fa-desktop', 'fa fa-laptop', 'fa fa-tablet', 'fa fa-mobile', 'fa fa-circle-o', 'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-spinner', 'fa fa-circle', 'fa fa-reply', 'fa fa-github-alt', 'fa fa-folder-o', 'fa fa-folder-open-o', 'fa fa-smile-o', 'fa fa-frown-o', 'fa fa-meh-o', 'fa fa-gamepad', 'fa fa-keyboard-o', 'fa fa-flag-o', 'fa fa-flag-checkered', 'fa fa-terminal', 'fa fa-code', 'fa fa-reply-all', 'fa fa-star-half-o', 'fa fa-location-arrow', 'fa fa-crop', 'fa fa-code-fork', 'fa fa-chain-broken', 'fa fa-question', 'fa fa-info', 'fa fa-exclamation', 'fa fa-superscript', 'fa fa-subscript', 'fa fa-eraser', 'fa fa-puzzle-piece', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-shield', 'fa fa-calendar-o', 'fa fa-fire-extinguisher', 'fa fa-rocket', 'fa fa-maxcdn', 'fa fa-chevron-circle-left', 'fa fa-chevron-circle-right', 'fa fa-chevron-circle-up', 'fa fa-chevron-circle-down', 'fa fa-html5', 'fa fa-css3', 'fa fa-anchor', 'fa fa-unlock-alt', 'fa fa-bullseye', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-rss-square', 'fa fa-play-circle', 'fa fa-ticket', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-level-up', 'fa fa-level-down', 'fa fa-check-square', 'fa fa-pencil-square', 'fa fa-external-link-square', 'fa fa-share-square', 'fa fa-compass', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-up', 'fa fa-caret-square-o-right', 'fa fa-eur', 'fa fa-gbp', 'fa fa-usd', 'fa fa-inr', 'fa fa-jpy', 'fa fa-rub', 'fa fa-krw', 'fa fa-btc', 'fa fa-file', 'fa fa-file-text', 'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-thumbs-up', 'fa fa-thumbs-down', 'fa fa-youtube-square', 'fa fa-youtube', 'fa fa-xing', 'fa fa-xing-square', 'fa fa-youtube-play', 'fa fa-dropbox', 'fa fa-stack-overflow', 'fa fa-instagram', 'fa fa-flickr', 'fa fa-adn', 'fa fa-bitbucket', 'fa fa-bitbucket-square', 'fa fa-tumblr', 'fa fa-tumblr-square', 'fa fa-long-arrow-down', 'fa fa-long-arrow-up', 'fa fa-long-arrow-left', 'fa fa-long-arrow-right', 'fa fa-apple', 'fa fa-windows', 'fa fa-android', 'fa fa-linux', 'fa fa-dribbble', 'fa fa-skype', 'fa fa-foursquare', 'fa fa-trello', 'fa fa-female', 'fa fa-male', 'fa fa-gratipay', 'fa fa-sun-o', 'fa fa-moon-o', 'fa fa-archive', 'fa fa-bug', 'fa fa-vk', 'fa fa-weibo', 'fa fa-renren', 'fa fa-pagelines', 'fa fa-stack-exchange', 'fa fa-arrow-circle-o-right', 'fa fa-arrow-circle-o-left', 'fa fa-caret-square-o-left', 'fa fa-dot-circle-o', 'fa fa-wheelchair', 'fa fa-vimeo-square', 'fa fa-try', 'fa fa-plus-square-o', 'fa fa-space-shuttle', 'fa fa-slack', 'fa fa-envelope-square', 'fa fa-wordpress', 'fa fa-openid', 'fa fa-university', 'fa fa-graduation-cap', 'fa fa-yahoo', 'fa fa-google', 'fa fa-reddit', 'fa fa-reddit-square', 'fa fa-stumbleupon-circle', 'fa fa-stumbleupon', 'fa fa-delicious', 'fa fa-digg', 'fa fa-pied-piper', 'fa fa-pied-piper-alt', 'fa fa-drupal', 'fa fa-joomla', 'fa fa-language', 'fa fa-fax', 'fa fa-building', 'fa fa-child', 'fa fa-paw', 'fa fa-spoon', 'fa fa-cube', 'fa fa-cubes', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-steam', 'fa fa-steam-square', 'fa fa-recycle', 'fa fa-car', 'fa fa-taxi', 'fa fa-tree', 'fa fa-spotify', 'fa fa-deviantart', 'fa fa-soundcloud', 'fa fa-database', 'fa fa-file-pdf-o', 'fa fa-file-word-o', 'fa fa-file-excel-o', 'fa fa-file-powerpoint-o', 'fa fa-file-image-o', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-video-o', 'fa fa-file-code-o', 'fa fa-vine', 'fa fa-codepen', 'fa fa-jsfiddle', 'fa fa-life-ring', 'fa fa-circle-o-notch', 'fa fa-rebel', 'fa fa-empire', 'fa fa-git-square', 'fa fa-git', 'fa fa-hacker-news', 'fa fa-tencent-weibo', 'fa fa-qq', 'fa fa-weixin', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-history', 'fa fa-circle-thin', 'fa fa-header', 'fa fa-paragraph', 'fa fa-sliders', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-bomb', 'fa fa-futbol-o', 'fa fa-tty', 'fa fa-binoculars', 'fa fa-plug', 'fa fa-slideshare', 'fa fa-twitch', 'fa fa-yelp', 'fa fa-newspaper-o', 'fa fa-wifi', 'fa fa-calculator', 'fa fa-paypal', 'fa fa-google-wallet', 'fa fa-cc-visa', 'fa fa-cc-mastercard', 'fa fa-cc-discover', 'fa fa-cc-amex', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-bell-slash', 'fa fa-bell-slash-o', 'fa fa-trash', 'fa fa-copyright', 'fa fa-at', 'fa fa-eyedropper', 'fa fa-paint-brush', 'fa fa-birthday-cake', 'fa fa-area-chart', 'fa fa-pie-chart', 'fa fa-line-chart', 'fa fa-lastfm', 'fa fa-lastfm-square', 'fa fa-toggle-off', 'fa fa-toggle-on', 'fa fa-bicycle', 'fa fa-bus', 'fa fa-ioxhost', 'fa fa-angellist', 'fa fa-cc', 'fa fa-ils', 'fa fa-meanpath', 'fa fa-buysellads', 'fa fa-connectdevelop', 'fa fa-dashcube', 'fa fa-forumbee', 'fa fa-leanpub', 'fa fa-sellsy', 'fa fa-shirtsinbulk', 'fa fa-simplybuilt', 'fa fa-skyatlas', 'fa fa-cart-plus', 'fa fa-cart-arrow-down', 'fa fa-diamond', 'fa fa-ship', 'fa fa-user-secret', 'fa fa-motorcycle', 'fa fa-street-view', 'fa fa-heartbeat', 'fa fa-venus', 'fa fa-mars', 'fa fa-mercury', 'fa fa-transgender', 'fa fa-transgender-alt', 'fa fa-venus-double', 'fa fa-mars-double', 'fa fa-venus-mars', 'fa fa-mars-stroke', 'fa fa-mars-stroke-v', 'fa fa-mars-stroke-h', 'fa fa-neuter', 'fa fa-genderless', 'fa fa-facebook-official', 'fa fa-pinterest-p', 'fa fa-whatsapp', 'fa fa-server', 'fa fa-user-plus', 'fa fa-user-times', 'fa fa-bed', 'fa fa-viacoin', 'fa fa-train', 'fa fa-subway', 'fa fa-medium', 'fa fa-y-combinator', 'fa fa-optin-monster', 'fa fa-opencart', 'fa fa-expeditedssl', 'fa fa-battery-full', 'fa fa-battery-three-quarters', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-empty', 'fa fa-mouse-pointer', 'fa fa-i-cursor', 'fa fa-object-group', 'fa fa-object-ungroup', 'fa fa-sticky-note', 'fa fa-sticky-note-o', 'fa fa-cc-jcb', 'fa fa-cc-diners-club', 'fa fa-clone', 'fa fa-balance-scale', 'fa fa-hourglass-o', 'fa fa-hourglass-start', 'fa fa-hourglass-half', 'fa fa-hourglass-end', 'fa fa-hourglass', 'fa fa-hand-rock-o', 'fa fa-hand-paper-o', 'fa fa-hand-scissors-o', 'fa fa-hand-lizard-o', 'fa fa-hand-spock-o', 'fa fa-hand-pointer-o', 'fa fa-hand-peace-o', 'fa fa-trademark', 'fa fa-registered', 'fa fa-creative-commons', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-tripadvisor', 'fa fa-odnoklassniki', 'fa fa-odnoklassniki-square', 'fa fa-get-pocket', 'fa fa-wikipedia-w', 'fa fa-safari', 'fa fa-chrome', 'fa fa-firefox', 'fa fa-opera', 'fa fa-internet-explorer', 'fa fa-television', 'fa fa-contao', 'fa fa-500px', 'fa fa-amazon', 'fa fa-calendar-plus-o', 'fa fa-calendar-minus-o', 'fa fa-calendar-times-o', 'fa fa-calendar-check-o', 'fa fa-industry', 'fa fa-map-pin', 'fa fa-map-signs', 'fa fa-map-o', 'fa fa-map', 'fa fa-commenting', 'fa fa-commenting-o', 'fa fa-houzz', 'fa fa-vimeo', 'fa fa-black-tie', 'fa fa-fonticons', 'fa fa-500px', 'fa fa-amazon', 'fa fa-balance-scale', 'fa fa-battery-0', 'fa fa-battery-1', 'fa fa-battery-2', 'fa fa-battery-3', 'fa fa-battery-4', 'fa fa-battery-empty', 'fa fa-battery-full', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-three-quarters', 'fa fa-black-tie', 'fa fa-calendar-check-o', 'fa fa-calendar-minus-o', 'fa fa-calendar-plus-o', 'fa fa-calendar-times-o', 'fa fa-cc-diners-club', 'fa fa-cc-jcb', 'fa fa-chrome', 'fa fa-clone', 'fa fa-commenting', 'fa fa-commenting-o', 'fa fa-contao', 'fa fa-creative-commons', 'fa fa-expeditedssl', 'fa fa-firefox', 'fa fa-fonticons', 'fa fa-genderless', 'fa fa-get-pocket', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-hand-grab-o', 'fa fa-hand-lizard-o', 'fa fa-hand-paper-o', 'fa fa-hand-peace-o', 'fa fa-hand-pointer-o', 'fa fa-hand-rock-o', 'fa fa-hand-scissors-o', 'fa fa-hand-spock-o', 'fa fa-hand-stop-o', 'fa fa-hourglass', 'fa fa-hourglass-1', 'fa fa-hourglass-2', 'fa fa-hourglass-3', 'fa fa-hourglass-end', 'fa fa-hourglass-half', 'fa fa-hourglass-o', 'fa fa-hourglass-start', 'fa fa-houzz', 'fa fa-i-cursor', 'fa fa-industry', 'fa fa-internet-explorer', 'fa fa-map', 'fa fa-map-o', 'fa fa-map-pin', 'fa fa-map-signs', 'fa fa-mouse-pointer', 'fa fa-object-group', 'fa fa-object-ungroup', 'fa fa-odnoklassniki', 'fa fa-odnoklassniki-square', 'fa fa-opencart', 'fa fa-opera', 'fa fa-optin-monster', 'fa fa-registered', 'fa fa-safari', 'fa fa-sticky-note', 'fa fa-sticky-note-o', 'fa fa-television', 'fa fa-trademark', 'fa fa-tripadvisor', 'fa fa-tv', 'fa fa-vimeo', 'fa fa-wikipedia-w', 'fa fa-y-combinator', 'fa fa-yc', 'fa fa-adjust', 'fa fa-anchor', 'fa fa-archive', 'fa fa-area-chart', 'fa fa-arrows', 'fa fa-arrows-h', 'fa fa-arrows-v', 'fa fa-asterisk', 'fa fa-at', 'fa fa-automobile', 'fa fa-balance-scale', 'fa fa-ban', 'fa fa-bank', 'fa fa-bar-chart', 'fa fa-bar-chart-o', 'fa fa-barcode', 'fa fa-bars', 'fa fa-battery-0', 'fa fa-battery-1', 'fa fa-battery-2', 'fa fa-battery-3', 'fa fa-battery-4', 'fa fa-battery-empty', 'fa fa-battery-full', 'fa fa-battery-half', 'fa fa-battery-quarter', 'fa fa-battery-three-quarters', 'fa fa-bed', 'fa fa-beer', 'fa fa-bell', 'fa fa-bell-o', 'fa fa-bell-slash', 'fa fa-bell-slash-o', 'fa fa-bicycle', 'fa fa-binoculars', 'fa fa-birthday-cake', 'fa fa-bolt', 'fa fa-bomb', 'fa fa-book', 'fa fa-bookmark', 'fa fa-bookmark-o', 'fa fa-briefcase', 'fa fa-bug', 'fa fa-building', 'fa fa-building-o', 'fa fa-bullhorn', 'fa fa-bullseye', 'fa fa-bus', 'fa fa-cab', 'fa fa-calculator', 'fa fa-calendar', 'fa fa-calendar-check-o', 'fa fa-calendar-minus-o', 'fa fa-calendar-o', 'fa fa-calendar-plus-o', 'fa fa-calendar-times-o', 'fa fa-camera', 'fa fa-camera-retro', 'fa fa-car', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-left', 'fa fa-caret-square-o-right', 'fa fa-caret-square-o-up', 'fa fa-cart-arrow-down', 'fa fa-cart-plus', 'fa fa-cc', 'fa fa-certificate', 'fa fa-check', 'fa fa-check-circle', 'fa fa-check-circle-o', 'fa fa-check-square', 'fa fa-check-square-o', 'fa fa-child', 'fa fa-circle', 'fa fa-circle-o', 'fa fa-circle-o-notch', 'fa fa-circle-thin', 'fa fa-clock-o', 'fa fa-clone', 'fa fa-close', 'fa fa-cloud', 'fa fa-cloud-download', 'fa fa-cloud-upload', 'fa fa-code', 'fa fa-code-fork', 'fa fa-coffee', 'fa fa-cog', 'fa fa-cogs', 'fa fa-comment', 'fa fa-comment-o', 'fa fa-commenting', 'fa fa-commenting-o', 'fa fa-comments', 'fa fa-comments-o', 'fa fa-compass', 'fa fa-copyright', 'fa fa-creative-commons', 'fa fa-credit-card', 'fa fa-crop', 'fa fa-crosshairs', 'fa fa-cube', 'fa fa-cubes', 'fa fa-cutlery', 'fa fa-dashboard', 'fa fa-database', 'fa fa-desktop', 'fa fa-diamond', 'fa fa-dot-circle-o', 'fa fa-download', 'fa fa-edit', 'fa fa-ellipsis-h', 'fa fa-ellipsis-v', 'fa fa-envelope', 'fa fa-envelope-o', 'fa fa-envelope-square', 'fa fa-eraser', 'fa fa-exchange', 'fa fa-exclamation', 'fa fa-exclamation-circle', 'fa fa-exclamation-triangle', 'fa fa-external-link', 'fa fa-external-link-square', 'fa fa-eye', 'fa fa-eye-slash', 'fa fa-eyedropper', 'fa fa-fax', 'fa fa-feed', 'fa fa-female', 'fa fa-fighter-jet', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o', 'fa fa-file-pdf-o', 'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o', 'fa fa-file-video-o', 'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-film', 'fa fa-filter', 'fa fa-fire', 'fa fa-fire-extinguisher', 'fa fa-flag', 'fa fa-flag-checkered', 'fa fa-flag-o', 'fa fa-flash', 'fa fa-flask', 'fa fa-folder', 'fa fa-folder-o', 'fa fa-folder-open', 'fa fa-folder-open-o', 'fa fa-frown-o', 'fa fa-futbol-o', 'fa fa-gamepad', 'fa fa-gavel', 'fa fa-gear', 'fa fa-gears', 'fa fa-gift', 'fa fa-glass', 'fa fa-globe', 'fa fa-graduation-cap', 'fa fa-group', 'fa fa-hand-grab-o', 'fa fa-hand-lizard-o', 'fa fa-hand-paper-o', 'fa fa-hand-peace-o', 'fa fa-hand-pointer-o', 'fa fa-hand-rock-o', 'fa fa-hand-scissors-o', 'fa fa-hand-spock-o', 'fa fa-hand-stop-o', 'fa fa-hdd-o', 'fa fa-headphones', 'fa fa-heart', 'fa fa-heart-o', 'fa fa-heartbeat', 'fa fa-history', 'fa fa-home', 'fa fa-hotel', 'fa fa-hourglass', 'fa fa-hourglass-1', 'fa fa-hourglass-2', 'fa fa-hourglass-3', 'fa fa-hourglass-end', 'fa fa-hourglass-half', 'fa fa-hourglass-o', 'fa fa-hourglass-start', 'fa fa-i-cursor', 'fa fa-image', 'fa fa-inbox', 'fa fa-industry', 'fa fa-info', 'fa fa-info-circle', 'fa fa-institution', 'fa fa-key', 'fa fa-keyboard-o', 'fa fa-language', 'fa fa-laptop', 'fa fa-leaf', 'fa fa-legal', 'fa fa-lemon-o', 'fa fa-level-down', 'fa fa-level-up', 'fa fa-life-bouy', 'fa fa-life-buoy', 'fa fa-life-ring', 'fa fa-life-saver', 'fa fa-lightbulb-o', 'fa fa-line-chart', 'fa fa-location-arrow', 'fa fa-lock', 'fa fa-magic', 'fa fa-magnet', 'fa fa-mail-forward', 'fa fa-mail-reply', 'fa fa-mail-reply-all', 'fa fa-male', 'fa fa-map', 'fa fa-map-marker', 'fa fa-map-o', 'fa fa-map-pin', 'fa fa-map-signs', 'fa fa-meh-o', 'fa fa-microphone', 'fa fa-microphone-slash', 'fa fa-minus', 'fa fa-minus-circle', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-mobile', 'fa fa-mobile-phone', 'fa fa-money', 'fa fa-moon-o', 'fa fa-mortar-board', 'fa fa-motorcycle', 'fa fa-mouse-pointer', 'fa fa-music', 'fa fa-navicon', 'fa fa-newspaper-o', 'fa fa-object-group', 'fa fa-object-ungroup', 'fa fa-paint-brush', 'fa fa-paper-plane', 'fa fa-paper-plane-o', 'fa fa-paw', 'fa fa-pencil', 'fa fa-pencil-square', 'fa fa-pencil-square-o', 'fa fa-phone', 'fa fa-phone-square', 'fa fa-photo', 'fa fa-picture-o', 'fa fa-pie-chart', 'fa fa-plane', 'fa fa-plug', 'fa fa-plus', 'fa fa-plus-circle', 'fa fa-plus-square', 'fa fa-plus-square-o', 'fa fa-power-off', 'fa fa-print', 'fa fa-puzzle-piece', 'fa fa-qrcode', 'fa fa-question', 'fa fa-question-circle', 'fa fa-quote-left', 'fa fa-quote-right', 'fa fa-random', 'fa fa-recycle', 'fa fa-refresh', 'fa fa-registered', 'fa fa-remove', 'fa fa-reorder', 'fa fa-reply', 'fa fa-reply-all', 'fa fa-retweet', 'fa fa-road', 'fa fa-rocket', 'fa fa-rss', 'fa fa-rss-square', 'fa fa-search', 'fa fa-search-minus', 'fa fa-search-plus', 'fa fa-send', 'fa fa-send-o', 'fa fa-server', 'fa fa-share', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-share-square', 'fa fa-share-square-o', 'fa fa-shield', 'fa fa-ship', 'fa fa-shopping-cart', 'fa fa-sign-in', 'fa fa-sign-out', 'fa fa-signal', 'fa fa-sitemap', 'fa fa-sliders', 'fa fa-smile-o', 'fa fa-soccer-ball-o', 'fa fa-sort', 'fa fa-sort-alpha-asc', 'fa fa-sort-alpha-desc', 'fa fa-sort-amount-asc', 'fa fa-sort-amount-desc', 'fa fa-sort-asc', 'fa fa-sort-desc', 'fa fa-sort-down', 'fa fa-sort-numeric-asc', 'fa fa-sort-numeric-desc', 'fa fa-sort-up', 'fa fa-space-shuttle', 'fa fa-spinner', 'fa fa-spoon', 'fa fa-square', 'fa fa-square-o', 'fa fa-star', 'fa fa-star-half', 'fa fa-star-half-empty', 'fa fa-star-half-full', 'fa fa-star-half-o', 'fa fa-star-o', 'fa fa-sticky-note', 'fa fa-sticky-note-o', 'fa fa-street-view', 'fa fa-suitcase', 'fa fa-sun-o', 'fa fa-support', 'fa fa-tablet', 'fa fa-tachometer', 'fa fa-tag', 'fa fa-tags', 'fa fa-tasks', 'fa fa-taxi', 'fa fa-television', 'fa fa-terminal', 'fa fa-thumb-tack', 'fa fa-thumbs-down', 'fa fa-thumbs-o-down', 'fa fa-thumbs-o-up', 'fa fa-thumbs-up', 'fa fa-ticket', 'fa fa-times', 'fa fa-times-circle', 'fa fa-times-circle-o', 'fa fa-tint', 'fa fa-toggle-down', 'fa fa-toggle-left', 'fa fa-toggle-off', 'fa fa-toggle-on', 'fa fa-toggle-right', 'fa fa-toggle-up', 'fa fa-trademark', 'fa fa-trash', 'fa fa-trash-o', 'fa fa-tree', 'fa fa-trophy', 'fa fa-truck', 'fa fa-tty', 'fa fa-tv', 'fa fa-umbrella', 'fa fa-university', 'fa fa-unlock', 'fa fa-unlock-alt', 'fa fa-unsorted', 'fa fa-upload', 'fa fa-user', 'fa fa-user-plus', 'fa fa-user-secret', 'fa fa-user-times', 'fa fa-users', 'fa fa-video-camera', 'fa fa-volume-down', 'fa fa-volume-off', 'fa fa-volume-up', 'fa fa-warning', 'fa fa-wheelchair', 'fa fa-wifi', 'fa fa-wrench', 'fa fa-hand-grab-o', 'fa fa-hand-lizard-o', 'fa fa-hand-o-down', 'fa fa-hand-o-left', 'fa fa-hand-o-right', 'fa fa-hand-o-up', 'fa fa-hand-paper-o', 'fa fa-hand-peace-o', 'fa fa-hand-pointer-o', 'fa fa-hand-rock-o', 'fa fa-hand-scissors-o', 'fa fa-hand-spock-o', 'fa fa-hand-stop-o', 'fa fa-thumbs-down', 'fa fa-thumbs-o-down', 'fa fa-thumbs-o-up', 'fa fa-thumbs-up', 'fa fa-ambulance', 'fa fa-automobile', 'fa fa-bicycle', 'fa fa-bus', 'fa fa-cab', 'fa fa-car', 'fa fa-fighter-jet', 'fa fa-motorcycle', 'fa fa-plane', 'fa fa-rocket', 'fa fa-ship', 'fa fa-space-shuttle', 'fa fa-subway', 'fa fa-taxi', 'fa fa-train', 'fa fa-truck', 'fa fa-wheelchair', 'fa fa-genderless', 'fa fa-intersex', 'fa fa-mars', 'fa fa-mars-double', 'fa fa-mars-stroke', 'fa fa-mars-stroke-h', 'fa fa-mars-stroke-v', 'fa fa-mercury', 'fa fa-neuter', 'fa fa-transgender', 'fa fa-transgender-alt', 'fa fa-venus', 'fa fa-venus-double', 'fa fa-venus-mars', 'fa fa-file', 'fa fa-file-archive-o', 'fa fa-file-audio-o', 'fa fa-file-code-o', 'fa fa-file-excel-o', 'fa fa-file-image-o', 'fa fa-file-movie-o', 'fa fa-file-o', 'fa fa-file-pdf-o', 'fa fa-file-photo-o', 'fa fa-file-picture-o', 'fa fa-file-powerpoint-o', 'fa fa-file-sound-o', 'fa fa-file-text', 'fa fa-file-text-o', 'fa fa-file-video-o', 'fa fa-file-word-o', 'fa fa-file-zip-o', 'fa fa-circle-o-notch', 'fa fa-cog', 'fa fa-gear', 'fa fa-refresh', 'fa fa-spinner', 'fa fa-check-square', 'fa fa-check-square-o', 'fa fa-circle', 'fa fa-circle-o', 'fa fa-dot-circle-o', 'fa fa-minus-square', 'fa fa-minus-square-o', 'fa fa-plus-square', 'fa fa-plus-square-o', 'fa fa-square', 'fa fa-square-o', 'fa fa-cc-amex', 'fa fa-cc-diners-club', 'fa fa-cc-discover', 'fa fa-cc-jcb', 'fa fa-cc-mastercard', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-cc-visa', 'fa fa-credit-card', 'fa fa-google-wallet', 'fa fa-paypal', 'fa fa-area-chart', 'fa fa-bar-chart', 'fa fa-bar-chart-o', 'fa fa-line-chart', 'fa fa-pie-chart', 'fa fa-bitcoin', 'fa fa-btc', 'fa fa-cny', 'fa fa-dollar', 'fa fa-eur', 'fa fa-euro', 'fa fa-gbp', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-ils', 'fa fa-inr', 'fa fa-jpy', 'fa fa-krw', 'fa fa-money', 'fa fa-rmb', 'fa fa-rouble', 'fa fa-rub', 'fa fa-ruble', 'fa fa-rupee', 'fa fa-shekel', 'fa fa-sheqel', 'fa fa-try', 'fa fa-turkish-lira', 'fa fa-usd', 'fa fa-won', 'fa fa-yen', 'fa fa-align-center', 'fa fa-align-justify', 'fa fa-align-left', 'fa fa-align-right', 'fa fa-bold', 'fa fa-chain', 'fa fa-chain-broken', 'fa fa-clipboard', 'fa fa-columns', 'fa fa-copy', 'fa fa-cut', 'fa fa-dedent', 'fa fa-eraser', 'fa fa-file', 'fa fa-file-o', 'fa fa-file-text', 'fa fa-file-text-o', 'fa fa-files-o', 'fa fa-floppy-o', 'fa fa-font', 'fa fa-header', 'fa fa-indent', 'fa fa-italic', 'fa fa-link', 'fa fa-list', 'fa fa-list-alt', 'fa fa-list-ol', 'fa fa-list-ul', 'fa fa-outdent', 'fa fa-paperclip', 'fa fa-paragraph', 'fa fa-paste', 'fa fa-repeat', 'fa fa-rotate-left', 'fa fa-rotate-right', 'fa fa-save', 'fa fa-scissors', 'fa fa-strikethrough', 'fa fa-subscript', 'fa fa-superscript', 'fa fa-table', 'fa fa-text-height', 'fa fa-text-width', 'fa fa-th', 'fa fa-th-large', 'fa fa-th-list', 'fa fa-underline', 'fa fa-undo', 'fa fa-unlink', 'fa fa-angle-double-down', 'fa fa-angle-double-left', 'fa fa-angle-double-right', 'fa fa-angle-double-up', 'fa fa-angle-down', 'fa fa-angle-left', 'fa fa-angle-right', 'fa fa-angle-up', 'fa fa-arrow-circle-down', 'fa fa-arrow-circle-left', 'fa fa-arrow-circle-o-down', 'fa fa-arrow-circle-o-left', 'fa fa-arrow-circle-o-right', 'fa fa-arrow-circle-o-up', 'fa fa-arrow-circle-right', 'fa fa-arrow-circle-up', 'fa fa-arrow-down', 'fa fa-arrow-left', 'fa fa-arrow-right', 'fa fa-arrow-up', 'fa fa-arrows', 'fa fa-arrows-alt', 'fa fa-arrows-h', 'fa fa-arrows-v', 'fa fa-caret-down', 'fa fa-caret-left', 'fa fa-caret-right', 'fa fa-caret-square-o-down', 'fa fa-caret-square-o-left', 'fa fa-caret-square-o-right', 'fa fa-caret-square-o-up', 'fa fa-caret-up', 'fa fa-chevron-circle-down', 'fa fa-chevron-circle-left', 'fa fa-chevron-circle-right', 'fa fa-chevron-circle-up', 'fa fa-chevron-down', 'fa fa-chevron-left', 'fa fa-chevron-right', 'fa fa-chevron-up', 'fa fa-exchange', 'fa fa-hand-o-down', 'fa fa-hand-o-left', 'fa fa-hand-o-right', 'fa fa-hand-o-up', 'fa fa-long-arrow-down', 'fa fa-long-arrow-left', 'fa fa-long-arrow-right', 'fa fa-long-arrow-up', 'fa fa-toggle-down', 'fa fa-toggle-left', 'fa fa-toggle-right', 'fa fa-toggle-up', 'fa fa-arrows-alt', 'fa fa-backward', 'fa fa-compress', 'fa fa-eject', 'fa fa-expand', 'fa fa-fast-backward', 'fa fa-fast-forward', 'fa fa-forward', 'fa fa-pause', 'fa fa-play', 'fa fa-play-circle', 'fa fa-play-circle-o', 'fa fa-random', 'fa fa-step-backward', 'fa fa-step-forward', 'fa fa-stop', 'fa fa-youtube-play', 'fa fa-500px', 'fa fa-adn', 'fa fa-amazon', 'fa fa-android', 'fa fa-angellist', 'fa fa-apple', 'fa fa-behance', 'fa fa-behance-square', 'fa fa-bitbucket', 'fa fa-bitbucket-square', 'fa fa-bitcoin', 'fa fa-black-tie', 'fa fa-btc', 'fa fa-buysellads', 'fa fa-cc-amex', 'fa fa-cc-diners-club', 'fa fa-cc-discover', 'fa fa-cc-jcb', 'fa fa-cc-mastercard', 'fa fa-cc-paypal', 'fa fa-cc-stripe', 'fa fa-cc-visa', 'fa fa-chrome', 'fa fa-codepen', 'fa fa-connectdevelop', 'fa fa-contao', 'fa fa-css3', 'fa fa-dashcube', 'fa fa-delicious', 'fa fa-deviantart', 'fa fa-digg', 'fa fa-dribbble', 'fa fa-dropbox', 'fa fa-drupal', 'fa fa-empire', 'fa fa-expeditedssl', 'fa fa-facebook', 'fa fa-facebook-f', 'fa fa-facebook-official', 'fa fa-facebook-square', 'fa fa-firefox', 'fa fa-flickr', 'fa fa-fonticons', 'fa fa-forumbee', 'fa fa-foursquare', 'fa fa-ge', 'fa fa-get-pocket', 'fa fa-gg', 'fa fa-gg-circle', 'fa fa-git', 'fa fa-git-square', 'fa fa-github', 'fa fa-github-alt', 'fa fa-github-square', 'fa fa-gittip', 'fa fa-google', 'fa fa-google-plus', 'fa fa-google-plus-square', 'fa fa-google-wallet', 'fa fa-gratipay', 'fa fa-hacker-news', 'fa fa-houzz', 'fa fa-html5', 'fa fa-instagram', 'fa fa-internet-explorer', 'fa fa-ioxhost', 'fa fa-joomla', 'fa fa-jsfiddle', 'fa fa-lastfm', 'fa fa-lastfm-square', 'fa fa-leanpub', 'fa fa-linkedin', 'fa fa-linkedin-square', 'fa fa-linux', 'fa fa-maxcdn', 'fa fa-meanpath', 'fa fa-medium', 'fa fa-odnoklassniki', 'fa fa-odnoklassniki-square', 'fa fa-opencart', 'fa fa-openid', 'fa fa-opera', 'fa fa-optin-monster', 'fa fa-pagelines', 'fa fa-paypal', 'fa fa-pied-piper', 'fa fa-pied-piper-alt', 'fa fa-pinterest', 'fa fa-pinterest-p', 'fa fa-pinterest-square', 'fa fa-qq', 'fa fa-ra', 'fa fa-rebel', 'fa fa-reddit', 'fa fa-reddit-square', 'fa fa-renren', 'fa fa-safari', 'fa fa-sellsy', 'fa fa-share-alt', 'fa fa-share-alt-square', 'fa fa-shirtsinbulk', 'fa fa-simplybuilt', 'fa fa-skyatlas', 'fa fa-skype', 'fa fa-slack', 'fa fa-slideshare', 'fa fa-soundcloud', 'fa fa-spotify', 'fa fa-stack-exchange', 'fa fa-stack-overflow', 'fa fa-steam', 'fa fa-steam-square', 'fa fa-stumbleupon', 'fa fa-stumbleupon-circle', 'fa fa-tencent-weibo', 'fa fa-trello', 'fa fa-tripadvisor', 'fa fa-tumblr', 'fa fa-tumblr-square', 'fa fa-twitch', 'fa fa-twitter', 'fa fa-twitter-square', 'fa fa-viacoin', 'fa fa-vimeo', 'fa fa-vimeo-square', 'fa fa-vine', 'fa fa-vk', 'fa fa-wechat', 'fa fa-weibo', 'fa fa-weixin', 'fa fa-whatsapp', 'fa fa-wikipedia-w', 'fa fa-windows', 'fa fa-wordpress', 'fa fa-xing', 'fa fa-xing-square', 'fa fa-y-combinator', 'fa fa-y-combinator-square', 'fa fa-yahoo', 'fa fa-yc', 'fa fa-yc-square', 'fa fa-yelp', 'fa fa-youtube', 'fa fa-youtube-play', 'fa fa-youtube-square', 'fa fa-ambulance', 'fa fa-h-square', 'fa fa-heart', 'fa fa-heart-o', 'fa fa-heartbeat', 'fa fa-hospital-o', 'fa fa-medkit', 'fa fa-plus-square', 'fa fa-stethoscope', 'fa fa-user-md', 'fa fa-wheelchair',  ),
				//'Foundation-icons' => array( 'general foundicon-settings', 'general foundicon-heart', 'general foundicon-star', 'general foundicon-plus', 'general foundicon-minus', 'general foundicon-checkmark', 'general foundicon-remove', 'general foundicon-mail', 'general foundicon-calendar', 'general foundicon-page', 'general foundicon-tools', 'general foundicon-globe', 'general foundicon-cloud', 'general foundicon-error', 'general foundicon-right-arrow', 'general foundicon-left-arrow', 'general foundicon-up-arrow', 'general foundicon-down-arrow', 'general foundicon-trash', 'general foundicon-add-doc', 'general foundicon-edit', 'general foundicon-lock', 'general foundicon-unlock', 'general foundicon-refresh', 'general foundicon-paper-clip', 'general foundicon-video', 'general foundicon-photo', 'general foundicon-graph', 'general foundicon-idea', 'general foundicon-mic', 'general foundicon-cart', 'general foundicon-address-book', 'general foundicon-compass', 'general foundicon-flag', 'general foundicon-location', 'general foundicon-clock', 'general foundicon-folder', 'general foundicon-inbox', 'general foundicon-website', 'general foundicon-smiley', 'general foundicon-search', 'general foundicon-phone', 'gen-enclosed foundicon-settings', 'gen-enclosed foundicon-heart', 'gen-enclosed foundicon-star', 'gen-enclosed foundicon-plus', 'gen-enclosed foundicon-minus', 'gen-enclosed foundicon-checkmark', 'gen-enclosed foundicon-remove', 'gen-enclosed foundicon-mail', 'gen-enclosed foundicon-calendar', 'gen-enclosed foundicon-page', 'gen-enclosed foundicon-tools', 'gen-enclosed foundicon-globe', 'gen-enclosed foundicon-cloud', 'gen-enclosed foundicon-error', 'gen-enclosed foundicon-right-arrow', 'gen-enclosed foundicon-left-arrow', 'gen-enclosed foundicon-up-arrow', 'gen-enclosed foundicon-down-arrow', 'gen-enclosed foundicon-trash', 'gen-enclosed foundicon-add-doc', 'gen-enclosed foundicon-edit', 'gen-enclosed foundicon-lock', 'gen-enclosed foundicon-unlock', 'gen-enclosed foundicon-refresh', 'gen-enclosed foundicon-paper-clip', 'gen-enclosed foundicon-video', 'gen-enclosed foundicon-photo', 'gen-enclosed foundicon-graph', 'gen-enclosed foundicon-idea', 'gen-enclosed foundicon-mic', 'gen-enclosed foundicon-cart', 'gen-enclosed foundicon-address-book', 'gen-enclosed foundicon-compass', 'gen-enclosed foundicon-flag', 'gen-enclosed foundicon-location', 'gen-enclosed foundicon-clock', 'gen-enclosed foundicon-folder', 'gen-enclosed foundicon-inbox', 'gen-enclosed foundicon-website', 'gen-enclosed foundicon-smiley', 'gen-enclosed foundicon-search', 'gen-enclosed foundicon-phone', 'social foundicon-thumb-up', 'social foundicon-thumb-down', 'social foundicon-rss', 'social foundicon-facebook', 'social foundicon-twitter', 'social foundicon-pinterest', 'social foundicon-github', 'social foundicon-path', 'social foundicon-linkedin', 'social foundicon-dribbble', 'social foundicon-stumble-upon', 'social foundicon-behance', 'social foundicon-reddit', 'social foundicon-google-plus', 'social foundicon-youtube', 'social foundicon-vimeo', 'social foundicon-flickr', 'social foundicon-slideshare', 'social foundicon-picassa', 'social foundicon-skype', 'social foundicon-instagram', 'social foundicon-foursquare', 'social foundicon-delicious', 'social foundicon-chat', 'social foundicon-torso', 'social foundicon-tumblr', 'social foundicon-video-chat', 'social foundicon-digg', 'social foundicon-wordpress', 'accessibility foundicon-wheelchair', 'accessibility foundicon-speaker', 'accessibility foundicon-fontsize', 'accessibility foundicon-eject', 'accessibility foundicon-view-mode', 'accessibility foundicon-eyeball', 'accessibility foundicon-asl', 'accessibility foundicon-person', 'accessibility foundicon-question', 'accessibility foundicon-adult', 'accessibility foundicon-child', 'accessibility foundicon-glasses', 'accessibility foundicon-cc', 'accessibility foundicon-blind', 'accessibility foundicon-braille', 'accessibility foundicon-iphone-home', 'accessibility foundicon-w3c', 'accessibility foundicon-css', 'accessibility foundicon-key', 'accessibility foundicon-hearing-impaired', 'accessibility foundicon-male', 'accessibility foundicon-female', 'accessibility foundicon-network', 'accessibility foundicon-guidedog', 'accessibility foundicon-universal-access', 'accessibility foundicon-elevator',  ),
				));
	}

	/**
	 * Animate.css animations
	 */
	public static function animations() {
		return apply_filters( 'perch/data/animations', array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip', 'flipInX', 'flipOutX', 'flipInY', 'flipOutY', 'fadeIn', 'fadeInUp', 'fadeInDown', 'fadeInLeft', 'fadeInRight', 'fadeInUpBig', 'fadeInDownBig', 'fadeInLeftBig', 'fadeInRightBig', 'fadeOut', 'fadeOutUp', 'fadeOutDown', 'fadeOutLeft', 'fadeOutRight', 'fadeOutUpBig', 'fadeOutDownBig', 'fadeOutLeftBig', 'fadeOutRightBig', 'slideInDown', 'slideInLeft', 'slideInRight', 'slideOutUp', 'slideOutLeft', 'slideOutRight', 'bounceIn', 'bounceInDown', 'bounceInUp', 'bounceInLeft', 'bounceInRight', 'bounceOut', 'bounceOutDown', 'bounceOutUp', 'bounceOutLeft', 'bounceOutRight', 'rotateIn', 'rotateInDownLeft', 'rotateInDownRight', 'rotateInUpLeft', 'rotateInUpRight', 'rotateOut', 'rotateOutDownLeft', 'rotateOutDownRight', 'rotateOutUpLeft', 'rotateOutUpRight', 'lightSpeedIn', 'lightSpeedOut', 'hinge', 'rollIn', 'rollOut' ) );
	}

	/**
	 * Examples section
	 */
	public static function examples() {
		return apply_filters( 'perch/data/examples', array(
				'basic' => array(
					'title' => __( 'Basic examples', 'perch' ),
					'items' => array(
						array(
							'name' => __( 'Accordions, spoilers, different styles, anchors', 'perch' ),
							'id'   => 'spoilers',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/spoilers.example',
							'icon' => 'tasks'
						),
						array(
							'name' => __( 'Tabs, vertical tabs, tab anchors', 'perch' ),
							'id'   => 'tabs',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/tabs.example',
							'icon' => 'folder'
						),
						array(
							'name' => __( 'Column layouts', 'perch' ),
							'id'   => 'columns',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/columns.example',
							'icon' => 'th-large'
						),
						array(
							'name' => __( 'Media elements, YouTube, Vimeo, Screenr and self-hosted videos, audio player', 'perch' ),
							'id'   => 'media',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/media.example',
							'icon' => 'play-circle'
						),
						array(
							'name' => __( 'Unlimited buttons', 'perch' ),
							'id'   => 'buttons',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/buttons.example',
							'icon' => 'heart'
						),
						array(
							'name' => __( 'Animations', 'perch' ),
							'id'   => 'animations',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/animations.example',
							'icon' => 'bolt'
						),
					)
				),
				'advanced' => array(
					'title' => __( 'Advanced examples', 'perch' ),
					'items' => array(
						array(
							'name' => __( 'Interacting with posts shortcode', 'perch' ),
							'id' => 'posts',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/posts.example',
							'icon' => 'list'
						),
						array(
							'name' => __( 'Nested shortcodes, shortcodes inside of attributes', 'perch' ),
							'id' => 'nested',
							'code' => plugin_dir_path( TP_PLUGIN_FILE ) . '/inc/examples/nested.example',
							'icon' => 'indent'
						),
					)
				),
			) );
	}

	/**
	 * Shortcodes
	 */
	public static function shortcodes( $shortcode = false ) {
		
		$shortcodes = apply_filters( 'perch/data/shortcodes', array(
				'testimonial' => array(  //[perch-testimonial {{attributes}}] {{content}} [/perch-testimonial]
					'name' => __( 'Tesitmonial', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(						
						'name' => array(
							'default' => 'Jhone doe',
							'name' => __( 'Name', 'perch' ),
							'desc' => __( '', 'perch' )
						),
						'title' => array(
							'default' => 'Marketing maneger',
							'name' => __( 'Title', 'perch' ),
							'desc' => __( 'e.g. Marketing maneger', 'perch' )
						),
						'website' => array(
							'default' => 'http://themeperch.net',
							'name' => __( 'Website', 'perch' ),
							'desc' => __( '', 'perch' )
						),
						'image' => array(
							'type' => 'upload',
							'default' => plugins_url( 'assets/images/testimonial.jpg', TP_PLUGIN_FILE ),
							'name' => __( 'Uplad photo', 'perch' ),
							'desc' => __( '', 'perch' )
						),
					),
					'content' => __( 'Lorem lean startup ipsum product market fit customer development acquihire technical cofounder.', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'clients_logo' => array(  //[perch-clients-logo {{attributes}}]
					'name' => __( 'Clients logo', 'perch' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'source' => array(
							'type' => 'image_source',
							'default' => 'none',
							'name' => __( 'Uplad Logos', 'perch' ),
							'desc' => __( '', 'perch' )
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'carousel' => array(  //[perch-carousel {{attributes}}]
					'name' => __( 'Carousel', 'perch' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'source' => array(
							'type' => 'image_source',
							'default' => 'none',
							'name' => __( 'Upload images', 'perch' ),
							'desc' => __( '', 'perch' )
						),
						'thumb_width' => array(
							'default' => 400,
							'type' => 'slider',
							'name' => __('Thumbnail width', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 200,
							'max' => 600,
							'step' => 5
						),
						'thumb_height' => array(
							'default' => 272,
							'type' => 'slider',
							'name' => __('Thumbnail height', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 100,
							'max' => 500,
							'step' => 2
						),
						'items' => array(
							'default' => 3,
							'type' => 'slider',
							'name' => __('Item show', 'perch'),
							'desc' => __('', 'perch'),
							'min' => 1,
							'max' => 10,
							'step' => 1
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'skillbar' => array(  //[perch_skillbar {{attributes}}] {{content}} [/perch_skillbar]
					'name' => __( 'Skillbar', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'title' => array(
							'default' => 'Marketing maneger',
							'name' => __( 'Title', 'perch' ),
						),
						'percentage' => array(
							'default' => 50,
							'type' => 'slider',
							'name' => __('Percentage', 'perch'),
							'desc' => __('e.g.: 100%', 'perch'),
							'min' => 1,
							'max' => 100,
							'step' => 1
						),
						'color' => array(
							'default' => '#6adcfa',
							'type' => 'color',
							'name' => __('Color', 'perch'),
							'desc' => __('e.g.: #6adcfa', 'perch')
						),
						'show_percent' => array(
							'default' => 'true',
							'type' => 'select',
							'name' => __('Show Percent', 'perch'),
							'desc' => __('e.g: true or false', 'perch'),
							'values' => array(
								'true' => 'True',
								'false' => 'False',
								
							)
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'feature' => array(  //[perch_spacing {{attributes}}]
					'name' => __( 'Feature', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'icon' => array(
							'default' => 'icon: lnr lnr-smile',
							'type' => 'icon',
							'name' => __('Select Icon', 'perch'),
						),
						'title' => array(
							'default' => 'Sample Title',
							'name' => __('title', 'perch'),
							'desc' => __('', 'perch'),
						),
					),
					'content' => __( 'Lorem lean startup ipsum product market fit customer development acquihire technical cofounder. User engagement.', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'feature_list' => array(  //[perch_spacing {{attributes}}]
					'name' => __( 'Feature List', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'icon' => array(
							'default' => 'icon: lnr lnr-smile',
							'type' => 'icon',
							'name' => __('Select Icon', 'perch'),
						),
						'title' => array(
							'default' => 'Sample Title',
							'name' => __('title', 'perch'),
							'desc' => __('', 'perch'),
						),
					),
					'content' => __( 'Lorem lean startup ipsum product market fit customer development acquihire tech cofounder. User engagement A/B testing.', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'service' => array(  //[perch_spacing {{attributes}}]
					'name' => __( 'Service', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'icon' => array(
							'default' => 'icon: lnr lnr-smile',
							'type' => 'icon',
							'name' => __('Select Icon', 'perch'),
						),
						'title' => array(
							'default' => '24/7 Chat Support',
							'name' => __('title', 'perch'),
							'desc' => __('', 'perch'),
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'spacing' => array(  //[perch_spacing {{attributes}}]
					'name' => __( 'Spacing', 'perch' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'size' => array(
							'default' => 20,
							'type' => 'slider',
							'name' => __('Size', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 1,
							'max' => 200,
							'step' => 1
						),
						'class' => array(
							'default' => '',
							'type' => 'text',
							'name' => __('Class', 'perch'),
							'desc' => __('', 'perch'),
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'social' => array(  //[perch_social {{attributes}}] {{content}} [/perch_social]
					'name' => __( 'Social', 'perch' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(						
						'title' => array(
							'default' => 'Follow Us',
							'name' => __('Follow Us', 'perch'),
							'desc' => __('', 'perch')
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'highlight' => array(  //[perch_highlight {{attributes}}] {{content}} [/perch_highlight]
					'name' => __( 'Highlight', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'color' => array(
							'default' => '#6adcfa',
							'type' => 'color',
							'name' => __('Color', 'perch'),
							'desc' => __('e.g.: #6adcfa', 'perch')
						),
						'visibility' => array(
							'default' => 'all',
							'name' => __('Visibility', 'perch'),
							'desc' => __('', 'perch'),
						),
						'class' => array(
							'default' => '',
							'name' => __('Class', 'perch'),
							'desc' => __('', 'perch'),
						)
					),
					'content' => __( 'Lorem ipsum dolor sit amet...', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'box' => array(  //[perch_box {{attributes}}] {{content}} [/perch_box]
					'name' => __( 'Box', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'color' => array(
							'default' => '#fff',
							'type' => 'color',
							'name' => __('Color', 'perch'),
							'desc' => __('', 'perch')
						),
						'bg_color' => array(
							'default' => '#ccc',
							'type' => 'color',
							'name' => __('Background Color', 'perch'),
							'desc' => __('', 'perch')
						),
						'float' => array(
							'default' => 'center',
							'type' => 'select',
							'name' => __('Float', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'left' => 'Left',
								'center' => 'Center',
								'right' => 'right'			
							)
						),
						'text_align' => array(
							'default' => 'left',
							'type' => 'select',
							'name' => __('Text Align', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'left' => 'Left',
								'center' => 'Center',
								'justify' => 'Justify',
								'right' => 'right'			
							)
						),
						'width' => array(
							'default' => 100,
							'type' => 'slider',
							'name' => __('Width', 'perch'),
							'desc' => __('in percentage', 'perch'),
							'min' => 0,
							'max' => 100,
							'step' => 1
						),
						'margin_top' => array(
							'default' => 10,
							'type' => 'slider',
							'name' => __('Margin Top', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 0,
							'max' => 100,
							'step' => 1
						),
						'margin_bottom' => array(
							'default' => 10,
							'type' => 'slider',
							'name' => __('Margin Bottom', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 0,
							'max' => 100,
							'step' => 1
						),
						'class' => array(
							'default' => '',
							'name' => __('Class', 'perch'),
							'desc' => __('', 'perch'),
						),
						'visibility' => array(
							'default' => 'all',
							'name' => __('Visibility', 'perch'),
							'desc' => __('e.g: all', 'perch')
						),
						'fade_in' => array(
							'default' => '',
							'type' => 'select',
							'name' => __('Fade In', 'perch'),
							'desc' => __('e.g: true or false', 'perch'),
							'values' => array(
								'true' => 'True',
								'false' => 'False',
								
							)
						)
					),
					'content' => __( 'Lorem ipsum dolor sit amet...', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'heading' => array(  //[perch_heading {{attributes}}] {{content}} [/perch_heading]
					'name' => __( 'Heading', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'title' => array(
							'default' => 'Sample Heading',
							'name' => __('Title', 'perch'),
							'desc' => __('', 'perch')
						),
						'heading_icon_left' => array(
							'default' => '',
							'type' => 'icon',
							'name' => __('Icon Left', 'perch'),
							'desc' => __('Pick a icon', 'perch')
						),
						'heading_icon_right' => array(
							'default' => '',
							'type' => 'icon',
							'name' => __('Icon Right', 'perch'),
							'desc' => __('pick a icon', 'perch')
						),
						'type' => array(
							'default' => 'h3',
							'type' => 'select',
							'name' => __('Type', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'h1' => 'H1',
								'h2' => 'H2',
								'h3' => 'H3',
								'h4' => 'H4',
								'h5' => 'H5',
								'h6' => 'H6'		
							)
						),
						'text_align' => array(
							'default' => 'left',
							'type' => 'select',
							'name' => __('Text Align', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'left' => 'Left',
								'center' => 'Center',								
								'right' => 'right'			
							)
						),
						'style' => array(
							'default' => 'colored-line',
							'type' => 'select',
							'name' => __('Style', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'single-line' => 'Single Line',
								'double-line' => 'Double Line',	
								'dotted-line' => 'Dotted line',	
								'dashed-line' => 'Dashed line',	
								'colored-line' => 'Colored line',
							)
						),
						'margin_top' => array(
							'default' => 10,
							'type' => 'slider',
							'name' => __('Margin Top', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 0,
							'max' => 100,
							'step' => 1
						),
						'margin_bottom' => array(
							'default' => 10,
							'type' => 'slider',
							'name' => __('Margin Bottom', 'perch'),
							'desc' => __('in pixel', 'perch'),
							'min' => 0,
							'max' => 100,
							'step' => 1
						),
						'class' => array(
							'default' => '',
							'name' => __('Class', 'perch'),
							'desc' => __('', 'perch'),
						),
						'color' => array(
							'default' => '#323232',
							'type' => 'color',
							'name' => __('Heading Color', 'perch'),
							'desc' => __('', 'perch')
						),
						'sub_heading_color' => array(
							'default' => '#727272',
							'type' => 'color',
							'name' => __('Sub Heading Color', 'perch'),
							'desc' => __('', 'perch')
						),
					),
					'content' => __( '', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),		
				'button' => array(  //[perch_button {{attributes}}] {{content}} [/perch_button]
					'name' => __( 'Button', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'title' => array(
							'default' => 'Sample button',
							'name' => __('Button text', 'perch'),
							'desc' => __('', 'perch'),
						),
						'color' => array(
							'default' => '#1e73be',
							'type' => 'color',
							'name' => __('Button color', 'perch'),
							'desc' => __('', 'perch'),
						),
						'size' => array(
							'type' => 'select',
							'name' => __('Button size', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'default' => 'Default',
								'small' => 'Small',
								'medium' => 'Medium',
								'large' => 'Large',
							),
						),
						'icon_left' => array(
							'type' => 'icon',
							'name' => __('Button left icon', 'perch'),
							'desc' => __('Pick a icon', 'perch'),
							'default' => '',
						),
						'icon_right' => array(
							'type' => 'icon',
							'name' => __('Button right icon', 'perch'),
							'desc' => __('Pick a icon', 'perch'),
							'default' => '',
						),
						'border_radius' => array(
							'type' => 'slider',
							'name' => __('Button border radius', 'perch'),
							'desc' => __('', 'perch'),
							'default' => '1',
							'min' => '0',
							'max' => '50',
							'step' => '1'
						),
						'url' => array(
							'default' => 'http://themeperch.net',
							'name' => __('Button url', 'perch'),
							'desc' => __('', 'perch'),
						),
						'rel' => array(
							'type' => 'select',
							'name' => __('Button Rel', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'none' => 'None',
								'nofollow' => 'nofollow',
								
							)
						),
						'target' => array(
							'type' => 'select',
							'name' => __('Button Rel', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'' => 'Self',
								'_blank' => 'Blank',
								
							)
						)
					),
					'content' => __( 'Add the column content.', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				'blogposts' => array(  //[perch_blog_posts {{attributes}}]
					'name' => __( 'Blog posts', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'column' => array(
							'default' => '3',
							'min' => '1',
							'max' => '6',
							'step' => '1',
							'type' => 'slider',
							'name' => __('Column', 'perch'),
							'desc' => __('', 'perch')
						),
						'posts_per_page' => array(
							'default' => '4',
							'min' => '1',
							'max' => '12',
							'step' => '1',
							'type' => 'slider',
							'name' => __('Posts per page', 'perch'),
							'desc' => __('', 'perch'),
						),
						'orderby' => array(
							'default' => 'title',
							'type' => 'select',
							'name' => __('Order By', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'title' => 'Title',
								'date' => 'Date'		
							)
						),
						'order' => array(
							'default' => 'DESC',
							'type' => 'select',
							'name' => __('Order', 'perch'),
							'desc' => __('', 'perch'),
							'values' => array(
								'DESC' => 'DESC',
								'ASC' => 'ASC'		
							)
						),
						'see_all_posts_text' => array(
							'default' => '',
							'name' => __('See All Posts Text', 'perch'),
							'desc' => __('See All Posts', 'perch'),
						)
					),
					'content' => __( 'Add the column content.', 'perch' ),
					'desc' => __( '', 'perch' ),
					'icon' => 'quote-left'
				),
				// tabs
				'tabs' => array(
					'name' => __( 'Tabs', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Choose style for this tabs', 'perch' ) 
						),
						'active' => array(
							'type' => 'number',
							'min' => 1,
							'max' => 100,
							'step' => 1,
							'default' => 1,
							'name' => __( 'Active tab', 'perch' ),
							'desc' => __( 'Select which tab is open by default', 'perch' )
						),
						'vertical' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Vertical', 'perch' ),
							'desc' => __( 'Show tabs vertically', 'perch' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Center', 'perch' ),
							'desc' => __( 'Applied only for Horizontal tab', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( "[%prefix_tab title=\"Title 1\"]Content 1[/%prefix_tab]\n[%prefix_tab title=\"Title 2\"]Content 2[/%prefix_tab]\n[%prefix_tab title=\"Title 3\"]Content 3[/%prefix_tab]", 'perch' ),
					'desc' => __( 'Tabs container', 'perch' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// tab
				'tab' => array(
					'name' => __( 'Tab', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Tab name', 'perch' ),
							'name' => __( 'Title', 'perch' ),
							'desc' => __( 'Enter tab name', 'perch' )
						),
						'disabled' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Disabled', 'perch' ),
							'desc' => __( 'Is this tab disabled', 'perch' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'perch' ),
							'desc' => __( 'You can use unique anchor for this tab to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This tab will be activated and scrolled in', 'perch' )
						),
						'url' => array(
							'default' => '',
							'name' => __( 'URL', 'perch' ),
							'desc' => __( 'You can link this tab to any webpage. Enter here full URL to switch this tab into link', 'perch' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self'  => __( 'Open link in same window/tab', 'perch' ),
								'blank' => __( 'Open link in new window/tab', 'perch' )
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'perch' ),
							'desc' => __( 'Choose how to open the custom tab link', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Tab content', 'perch' ),
					'desc' => __( 'Single tab', 'perch' ),
					'note' => __( 'Did you know that you need to wrap single tabs with [tabs] shortcode?', 'perch' ),
					'example' => 'tabs',
					'icon' => 'list-alt'
				),
				// spoiler
				'spoiler' => array(
					'name' => __( 'Spoiler', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'title' => array(
							'default' => __( 'Spoiler title', 'perch' ),
							'name' => __( 'Title', 'perch' ), 'desc' => __( 'Text in spoiler title', 'perch' )
						),
						'open' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Open', 'perch' ),
							'desc' => __( 'Is spoiler content visible by default', 'perch' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'fancy' => __( 'Fancy', 'perch' ),
								'simple' => __( 'Simple', 'perch' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Choose style for this spoiler', 'perch' ) 
						),
						'icon' => array(
							'type' => 'select',
							'values' => array(
								'plus'           => __( 'Plus', 'perch' ),
								'plus-circle'    => __( 'Plus circle', 'perch' ),
								'plus-square-1'  => __( 'Plus square 1', 'perch' ),
								'plus-square-2'  => __( 'Plus square 2', 'perch' ),
								'arrow'          => __( 'Arrow', 'perch' ),
								'arrow-circle-1' => __( 'Arrow circle 1', 'perch' ),
								'arrow-circle-2' => __( 'Arrow circle 2', 'perch' ),
								'chevron'        => __( 'Chevron', 'perch' ),
								'chevron-circle' => __( 'Chevron circle', 'perch' ),
								'caret'          => __( 'Caret', 'perch' ),
								'caret-square'   => __( 'Caret square', 'perch' ),
								'folder-1'       => __( 'Folder 1', 'perch' ),
								'folder-2'       => __( 'Folder 2', 'perch' )
							),
							'default' => 'plus',
							'name' => __( 'Icon', 'perch' ),
							'desc' => __( 'Icons for spoiler', 'perch' )
						),
						'anchor' => array(
							'default' => '',
							'name' => __( 'Anchor', 'perch' ),
							'desc' => __( 'You can use unique anchor for this spoiler to access it with hash in page url. For example: type here <b%value>Hello</b> and then use url like http://example.com/page-url#Hello. This spoiler will be open and scrolled in', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Hidden content', 'perch' ),
					'desc' => __( 'Spoiler with hidden content', 'perch' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'perch' ),
					'example' => 'spoilers',
					'icon' => 'list-ul'
				),
				// accordion
				'accordion' => array(
					'name' => __( 'Accordion', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( "[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]\n[%prefix_spoiler]Content[/%prefix_spoiler]", 'perch' ),
					'desc' => __( 'Accordion with spoilers', 'perch' ),
					'note' => __( 'Did you know that you can wrap multiple spoilers with [accordion] shortcode to create accordion effect?', 'perch' ),
					'example' => 'spoilers',
					'icon' => 'list'
				),
				// divider
				'divider' => array(
					'name' => __( 'Divider', 'perch' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'top' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show TOP link', 'perch' ),
							'desc' => __( 'Show link to top of the page or not', 'perch' )
						),
						'text' => array(
							'values' => array( ),
							'default' => __( 'Go to top', 'perch' ),
							'name' => __( 'Link text', 'perch' ), 'desc' => __( 'Text for the GO TOP link', 'perch' )
						),
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'dotted'  => __( 'Dotted', 'perch' ),
								'dashed'  => __( 'Dashed', 'perch' ),
								'double'  => __( 'Double', 'perch' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Choose style for this divider', 'perch' )
						),
						'divider_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Divider color', 'perch' ),
							'desc' => __( 'Pick the color for divider', 'perch' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#999999',
							'name' => __( 'Link color', 'perch' ),
							'desc' => __( 'Pick the color for TOP link', 'perch' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 40,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'perch' ),
							'desc' => __( 'Height of the divider (in pixels)', 'perch' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 200,
							'step' => 5,
							'default' => 15,
							'name' => __( 'Margin', 'perch' ),
							'desc' => __( 'Adjust the top and bottom margins of this divider (in pixels)', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Content divider with optional TOP link', 'perch' ),
					'icon' => 'ellipsis-h'
				),
			// quote
				'quote' => array(
					'name' => __( 'Quote', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'2' => __( 'Style 2', 'perch' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Choose style for this quote', 'perch' ) 
						),
						'cite' => array(
							'default' => '',
							'name' => __( 'Cite', 'perch' ),
							'desc' => __( 'Quote author name', 'perch' )
						),
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Cite url', 'perch' ),
							'desc' => __( 'Url of the quote author. Leave empty to disable link', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Quote', 'perch' ),
					'desc' => __( 'Blockquote alternative', 'perch' ),
					'icon' => 'quote-right'
				),
				// pullquote
				'pullquote' => array(
					'name' => __( 'Pullquote', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'perch' ),
								'right' => __( 'Right', 'perch' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'perch' ), 'desc' => __( 'Pullquote alignment (float)', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Pullquote', 'perch' ),
					'desc' => __( 'Pullquote', 'perch' ),
					'icon' => 'quote-left'
				),
				// dropcap
				'dropcap' => array(
					'name' => __( 'Dropcap', 'perch' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'flat' => __( 'Flat', 'perch' ),
								'light' => __( 'Light', 'perch' ),
								'simple' => __( 'Simple', 'perch' )
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ), 'desc' => __( 'Dropcap style preset', 'perch' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 5,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Size', 'perch' ),
							'desc' => __( 'Choose dropcap size', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'D', 'perch' ),
					'desc' => __( 'Dropcap', 'perch' ),
					'icon' => 'bold'
				),
				// frame
				'frame' => array(
					'name' => __( 'Frame', 'perch' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'perch' ),
								'center' => __( 'Center', 'perch' ),
								'right' => __( 'Right', 'perch' )
							),
							'default' => 'left',
							'name' => __( 'Align', 'perch' ),
							'desc' => __( 'Frame alignment', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => '<img src="http://lorempixel.com/g/400/200/" />',
					'desc' => __( 'Styled image frame', 'perch' ),
					'icon' => 'picture-o'
				),
				// row
				'row' => array(
					'name' => __( 'Row', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( "[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]\n[%prefix_column size=\"1/3\"]Content[/%prefix_column]", 'perch' ),
					'desc' => __( 'Row for flexible columns', 'perch' ),
					'icon' => 'columns'
				),
				// column
				'column' => array(
					'name' => __( 'Column', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'size' => array(
							'type' => 'select',
							'values' => array(
								'1/1' => __( 'Full width', 'perch' ),
								'1/2' => __( 'One half', 'perch' ),
								'1/3' => __( 'One third', 'perch' ),
								'2/3' => __( 'Two third', 'perch' ),
								'1/4' => __( 'One fourth', 'perch' ),
								'3/4' => __( 'Three fourth', 'perch' ),
								'1/5' => __( 'One fifth', 'perch' ),
								'2/5' => __( 'Two fifth', 'perch' ),
								'3/5' => __( 'Three fifth', 'perch' ),
								'4/5' => __( 'Four fifth', 'perch' ),
								'1/6' => __( 'One sixth', 'perch' ),
								'5/6' => __( 'Five sixth', 'perch' )
							),
							'default' => '1/2',
							'name' => __( 'Size', 'perch' ),
							'desc' => __( 'Select column width. This width will be calculated depend page width', 'perch' )
						),
						'center' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Centered', 'perch' ),
							'desc' => __( 'Is this column centered on the page', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Column content', 'perch' ),
					'desc' => __( 'Flexible and responsive columns', 'perch' ),
					'note' => __( 'Did you know that you need to wrap columns with [row] shortcode?', 'perch' ),
					'example' => 'columns',
					'icon' => 'columns'
				),
				// list
				'list' => array(
					'name' => __( 'List', 'perch' ),
					'type' => 'wrap',
					'group' => 'content',
					'atts' => array(
						'icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Icon', 'perch' ),
							'desc' => __( 'You can upload custom icon for this list or pick a built-in icon', 'perch' )
						),
						'icon_color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Icon color', 'perch' ),
							'desc' => __( 'This color will be applied to the selected icon. Does not works with uploaded icons', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( "<ul>\n<li>List item</li>\n<li>List item</li>\n<li>List item</li>\n</ul>", 'perch' ),
					'desc' => __( 'Styled unordered list', 'perch' ),
					'icon' => 'list-ol'
				),// expand
				'expand' => array(
					'name' => __( 'Expand', 'perch' ),
					'type' => 'wrap',
					'group' => 'box',
					'atts' => array(
						'more_text' => array(
							'default' => __( 'Show more', 'perch' ),
							'name' => __( 'More text', 'perch' ),
							'desc' => __( 'Enter the text for more link', 'perch' )
						),
						'less_text' => array(
							'default' => __( 'Show less', 'perch' ),
							'name' => __( 'Less text', 'perch' ),
							'desc' => __( 'Enter the text for less link', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 1000,
							'step' => 10,
							'default' => 100,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Height for collapsed state (in pixels)', 'perch' )
						),
						'hide_less' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Hide less link', 'perch' ),
							'desc' => __( 'This option allows you to hide less link, when the text block has been expanded', 'perch' )
						),
						'text_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#333333',
							'name' => __( 'Text color', 'perch' ),
							'desc' => __( 'Pick the text color', 'perch' )
						),
						'link_color' => array(
							'type' => 'color',
							'values' => array( ),
							'default' => '#0088FF',
							'name' => __( 'Link color', 'perch' ),
							'desc' => __( 'Pick the link color', 'perch' )
						),
						'link_style' => array(
							'type' => 'select',
							'values' => array(
								'default'    => __( 'Default', 'perch' ),
								'underlined' => __( 'Underlined', 'perch' ),
								'dotted'     => __( 'Dotted', 'perch' ),
								'dashed'     => __( 'Dashed', 'perch' ),
								'button'     => __( 'Button', 'perch' ),
							),
							'default' => 'default',
							'name' => __( 'Link style', 'perch' ),
							'desc' => __( 'Select the style for more/less link', 'perch' )
						),
						'link_align' => array(
							'type' => 'select',
							'values' => array(
								'left' => __( 'Left', 'perch' ),
								'center' => __( 'Center', 'perch' ),
								'right' => __( 'Right', 'perch' ),
							),
							'default' => 'left',
							'name' => __( 'Link align', 'perch' ),
							'desc' => __( 'Select link alignment', 'perch' )
						),
						'more_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'More icon', 'perch' ),
							'desc' => __( 'Add an icon to the more link', 'perch' )
						),
						'less_icon' => array(
							'type' => 'icon',
							'default' => '',
							'name' => __( 'Less icon', 'perch' ),
							'desc' => __( 'Add an icon to the less link', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'This text block can be expanded', 'perch' ),
					'desc' => __( 'Expandable text block', 'perch' ),
					'icon' => 'sort-amount-asc'
				),
				// lightbox
				'lightbox' => array(
					'name' => __( 'Lightbox', 'perch' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array(
								'iframe' => __( 'Iframe', 'perch' ),
								'image' => __( 'Image', 'perch' ),
								'inline' => __( 'Inline (html content)', 'perch' )
							),
							'default' => 'iframe',
							'name' => __( 'Content type', 'perch' ),
							'desc' => __( 'Select type of the lightbox window content', 'perch' )
						),
						'src' => array(
							'default' => '',
							'name' => __( 'Content source', 'perch' ),
							'desc' => __( 'Insert here URL or CSS selector. Use URL for Iframe and Image content types. Use CSS selector for Inline content type.<br />Example values:<br /><b%value>http://www.youtube.com/watch?v=XXXXXXXXX</b> - YouTube video (iframe)<br /><b%value>http://example.com/wp-content/uploads/image.jpg</b> - uploaded image (image)<br /><b%value>http://example.com/</b> - any web page (iframe)<br /><b%value>#my-custom-popup</b> - any HTML content (inline)', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( '[%prefix_button] Click Here to Watch the Video [/%prefix_button]', 'perch' ),
					'desc' => __( 'Lightbox window with custom content', 'perch' ),
					'icon' => 'external-link'
				),
				// lightbox content
				'lightbox_content' => array(
					'name' => __( 'Lightbox content', 'perch' ),
					'type' => 'wrap',
					'group' => 'gallery',
					'atts' => array(
						'id' => array(
							'default' => '',
							'name' => __( 'ID', 'perch' ),
							'desc' => sprintf( __( 'Enter here the ID from Content source field. %s Example value: %s', 'perch' ), '<br>', '<b%value>my-custom-popup</b>' )
						),
						'width' => array(
							'default' => '50%',
							'name' => __( 'Width', 'perch' ),
							'desc' => sprintf( __( 'Adjust the width for inline content (in pixels or percents). %s Example values: %s, %s, %s', 'perch' ), '<br>', '<b%value>300px</b>', '<b%value>600px</b>', '<b%value>90%</b>' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Margin', 'perch' ),
							'desc' => __( 'Adjust the margin for inline content (in pixels)', 'perch' )
						),
						'padding' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 600,
							'step' => 5,
							'default' => 40,
							'name' => __( 'Padding', 'perch' ),
							'desc' => __( 'Adjust the padding for inline content (in pixels)', 'perch' )
						),
						'text_align' => array(
							'type' => 'select',
							'values' => array(
								'left'   => __( 'Left', 'perch' ),
								'center' => __( 'Center', 'perch' ),
								'right'  => __( 'Right', 'perch' )
							),
							'default' => 'center',
							'name' => __( 'Text alignment', 'perch' ),
							'desc' => __( 'Select the text alignment', 'perch' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFFFFF',
							'name' => __( 'Background color', 'perch' ),
							'desc' => __( 'Pick a background color', 'perch' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'perch' ),
							'desc' => __( 'Pick a text color', 'perch' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#333333',
							'name' => __( 'Text color', 'perch' ),
							'desc' => __( 'Pick a text color', 'perch' )
						),
						'shadow' => array(
							'type' => 'shadow',
							'default' => '0px 0px 15px #333333',
							'name' => __( 'Shadow', 'perch' ),
							'desc' => __( 'Adjust the shadow for content box', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Inline content', 'perch' ),
					'desc' => __( 'Inline content for lightbox', 'perch' ),
					'icon' => 'external-link'
				),
				// tooltip
				'tooltip' => array(
					'name' => __( 'Tooltip', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'light' => __( 'Basic: Light', 'perch' ),
								'dark' => __( 'Basic: Dark', 'perch' ),
								'yellow' => __( 'Basic: Yellow', 'perch' ),
								'green' => __( 'Basic: Green', 'perch' ),
								'red' => __( 'Basic: Red', 'perch' ),
								'blue' => __( 'Basic: Blue', 'perch' ),
								'youtube' => __( 'Youtube', 'perch' ),
								'tipsy' => __( 'Tipsy', 'perch' ),
								'bootstrap' => __( 'Bootstrap', 'perch' ),
								'jtools' => __( 'jTools', 'perch' ),
								'tipped' => __( 'Tipped', 'perch' ),
								'cluetip' => __( 'Cluetip', 'perch' ),
							),
							'default' => 'yellow',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Tooltip window style', 'perch' )
						),
						'position' => array(
							'type' => 'select',
							'values' => array(
								'north' => __( 'Top', 'perch' ),
								'south' => __( 'Bottom', 'perch' ),
								'west' => __( 'Left', 'perch' ),
								'east' => __( 'Right', 'perch' )
							),
							'default' => 'top',
							'name' => __( 'Position', 'perch' ),
							'desc' => __( 'Tooltip position', 'perch' )
						),
						'shadow' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Shadow', 'perch' ),
							'desc' => __( 'Add shadow to tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'perch' )
						),
						'rounded' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Rounded corners', 'perch' ),
							'desc' => __( 'Use rounded for tooltip. This option is only works with basic styes, e.g. blue, green etc.', 'perch' )
						),
						'size' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'1' => 1,
								'2' => 2,
								'3' => 3,
								'4' => 4,
								'5' => 5,
								'6' => 6,
							),
							'default' => 'default',
							'name' => __( 'Font size', 'perch' ),
							'desc' => __( 'Tooltip font size', 'perch' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Tooltip title', 'perch' ),
							'desc' => __( 'Enter title for tooltip window. Leave this field empty to hide the title', 'perch' )
						),
						'content' => array(
							'default' => __( 'Tooltip text', 'perch' ),
							'name' => __( 'Tooltip content', 'perch' ),
							'desc' => __( 'Enter tooltip content here', 'perch' )
						),
						'behavior' => array(
							'type' => 'select',
							'values' => array(
								'hover' => __( 'Show and hide on mouse hover', 'perch' ),
								'click' => __( 'Show and hide by mouse click', 'perch' ),
								'always' => __( 'Always visible', 'perch' )
							),
							'default' => 'hover',
							'name' => __( 'Behavior', 'perch' ),
							'desc' => __( 'Select tooltip behavior', 'perch' )
						),
						'close' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Close button', 'perch' ),
							'desc' => __( 'Show close button', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( '[%prefix_button] Hover me to open tooltip [/%prefix_button]', 'perch' ),
					'desc' => __( 'Tooltip window with custom content', 'perch' ),
					'icon' => 'comment-o'
				),
				// private
				'private' => array(
					'name' => __( 'Private', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Private note text', 'perch' ),
					'desc' => __( 'Private note for post authors', 'perch' ),
					'icon' => 'lock'
				),
				// youtube
				'youtube' => array(
					'name' => __( 'YouTube', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Play video automatically when page is loaded', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'YouTube video', 'perch' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// youtube_advanced
				'youtube_advanced' => array(
					'name' => __( 'YouTube Advanced', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url of YouTube page with video. Ex: http://youtube.com/watch?v=XXXXXX', 'perch' )
						),
						'playlist' => array(
							'default' => '',
							'name' => __( 'Playlist', 'perch' ),
							'desc' => __( 'Value is a comma-separated list of video IDs to play. If you specify a value, the first video that plays will be the VIDEO_ID specified in the URL path, and the videos specified in the playlist parameter will play thereafter', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'perch' )
						),
						'controls' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Hide controls', 'perch' ),
								'yes' => __( '1 - Show controls', 'perch' ),
								'alt' => __( '2 - Show controls when playback is started', 'perch' )
							),
							'default' => 'yes',
							'name' => __( 'Controls', 'perch' ),
							'desc' => __( 'This parameter indicates whether the video player controls will display', 'perch' )
						),
						'autohide' => array(
							'type' => 'select',
							'values' => array(
								'no' => __( '0 - Do not hide controls', 'perch' ),
								'yes' => __( '1 - Hide all controls on mouse out', 'perch' ),
								'alt' => __( '2 - Hide progress bar on mouse out', 'perch' )
							),
							'default' => 'alt',
							'name' => __( 'Autohide', 'perch' ),
							'desc' => __( 'This parameter indicates whether the video controls will automatically hide after a video begins playing', 'perch' )
						),
						'showinfo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show title bar', 'perch' ),
							'desc' => __( 'If you set the parameter value to NO, then the player will not display information like the video title and uploader before the video starts playing.', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Play video automatically when page is loaded', 'perch' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'perch' ),
							'desc' => __( 'Setting of YES will cause the player to play the initial video again and again', 'perch' )
						),
						'rel' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Related videos', 'perch' ),
							'desc' => __( 'This parameter indicates whether the player should show related videos when playback of the initial video ends', 'perch' )
						),
						'fs' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show full-screen button', 'perch' ),
							'desc' => __( 'Setting this parameter to NO prevents the fullscreen button from displaying', 'perch' )
						),
						'modestbranding' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => 'modestbranding',
							'desc' => __( 'This parameter lets you use a YouTube player that does not show a YouTube logo. Set the parameter value to YES to prevent the YouTube logo from displaying in the control bar. Note that a small YouTube text label will still display in the upper-right corner of a paused video when the user\'s mouse pointer hovers over the player', 'perch' )
						),
						'theme' => array(
							'type' => 'select',
							'values' => array(
								'dark' => __( 'Dark theme', 'perch' ),
								'light' => __( 'Light theme', 'perch' )
							),
							'default' => 'dark',
							'name' => __( 'Theme', 'perch' ),
							'desc' => __( 'This parameter indicates whether the embedded player will display player controls (like a play button or volume control) within a dark or light control bar', 'perch' )
						),
						'https' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Force HTTPS', 'perch' ),
							'desc' => __( 'Use HTTPS in player iframe', 'perch' )
						),
						'wmode' => array(
							'default' => '',
							'name'    => __( 'WMode', 'perch' ),
							'desc'    => sprintf( __( 'Here you can specify wmode value for the embed URL. %s Example values: %s, %s', 'perch' ), '<br>', '<b%value>transparent</b>', '<b%value>opaque</b>' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'YouTube video player with advanced settings', 'perch' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// vimeo
				'vimeo' => array(
					'name' => __( 'Vimeo', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'perch' ), 'desc' => __( 'Url of Vimeo page with video', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Play video automatically when page is loaded', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Vimeo video', 'perch' ),
					'example' => 'media',
					'icon' => 'youtube-play'
				),
				// screenr
				'screenr' => array(
					'name' => __( 'Screenr', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url of Screenr page with video', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Screenr video', 'perch' ),
					'icon' => 'youtube-play'
				),
				// dailymotion
				'dailymotion' => array(
					'name' => __( 'Dailymotion', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url of Dailymotion page with video', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make player responsive', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Start the playback of the video automatically after the player load. May not work on some mobile OS versions', 'perch' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#FFC300',
							'name' => __( 'Background color', 'perch' ),
							'desc' => __( 'HTML color of the background of controls elements', 'perch' )
						),
						'foreground' => array(
							'type' => 'color',
							'default' => '#F7FFFD',
							'name' => __( 'Foreground color', 'perch' ),
							'desc' => __( 'HTML color of the foreground of controls elements', 'perch' )
						),
						'highlight' => array(
							'type' => 'color',
							'default' => '#171D1B',
							'name' => __( 'Highlight color', 'perch' ),
							'desc' => __( 'HTML color of the controls elements\' highlights', 'perch' )
						),
						'logo' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show logo', 'perch' ),
							'desc' => __( 'Allows to hide or show the Dailymotion logo', 'perch' )
						),
						'quality' => array(
							'type' => 'select',
							'values' => array(
								'240'  => '240',
								'380'  => '380',
								'480'  => '480',
								'720'  => '720',
								'1080' => '1080'
							),
							'default' => '380',
							'name' => __( 'Quality', 'perch' ),
							'desc' => __( 'Determines the quality that must be played by default if available', 'perch' )
						),
						'related' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show related videos', 'perch' ),
							'desc' => __( 'Show related videos at the end of the video', 'perch' )
						),
						'info' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Show video info', 'perch' ),
							'desc' => __( 'Show videos info (title/author) on the start screen', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Dailymotion video', 'perch' ),
					'icon' => 'youtube-play'
				),
				// audio
				'audio' => array(
					'name' => __( 'Audio', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'perch' ),
							'desc' => __( 'Audio file url. Supported formats: mp3, ogg', 'perch' )
						),
						'width' => array(
							'values' => array(),
							'default' => '100%',
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width. You can specify width in percents and player will be responsive. Example values: <b%value>200px</b>, <b%value>100&#37;</b>', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Play file automatically when page is loaded', 'perch' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'perch' ),
							'desc' => __( 'Repeat when playback is ended', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Custom audio player', 'perch' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// video
				'video' => array(
					'name' => __( 'Video', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'File', 'perch' ),
							'desc' => __( 'Url to mp4/flv video-file', 'perch' )
						),
						'poster' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Poster', 'perch' ),
							'desc' => __( 'Url to poster image, that will be shown before playback', 'perch' )
						),
						'title' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Title', 'perch' ),
							'desc' => __( 'Player title', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Player width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 300,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Player height', 'perch' )
						),
						'controls' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Controls', 'perch' ),
							'desc' => __( 'Show player controls (play/pause etc.) or not', 'perch' )
						),
						'autoplay' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Autoplay', 'perch' ),
							'desc' => __( 'Play file automatically when page is loaded', 'perch' )
						),
						'loop' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Loop', 'perch' ),
							'desc' => __( 'Repeat when playback is ended', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Custom video player', 'perch' ),
					'example' => 'media',
					'icon' => 'play-circle'
				),
				// table
				'table' => array(
					'name' => __( 'Table', 'perch' ),
					'type' => 'mixed',
					'group' => 'content',
					'atts' => array(
						'style' => array(
							'type' => 'select',
							'values' => array(
								'default' => __( 'Default', 'perch' ),
								'2' => __( 'Style 2', 'perch' ),
							),
							'default' => 'default',
							'name' => __( 'Style', 'perch' ),
							'desc' => __( 'Choose style for this heading', 'perch' ) 
						),
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'CSV file', 'perch' ),
							'desc' => __( 'Upload CSV file if you want to create HTML-table from file', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( "<table>\n<tr>\n\t<th>Table</th>\n\t<th>Table</th>\n</tr>\n<tr>\n\t<td>Table</td>\n\t<td>Table</td>\n</tr>\n</table>", 'perch' ),
					'desc' => __( 'Styled table from HTML or CSV file', 'perch' ),
					'icon' => 'table'
				),
				// permalink
				'permalink' => array(
					'name' => __( 'Permalink', 'perch' ),
					'type' => 'mixed',
					'group' => 'content other',
					'atts' => array(
						'id' => array(
							'values' => array( ), 'default' => 1,
							'name' => __( 'ID', 'perch' ),
							'desc' => __( 'Post or page ID', 'perch' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Same tab', 'perch' ),
								'blank' => __( 'New tab', 'perch' )
							),
							'default' => 'self',
							'name' => __( 'Target', 'perch' ),
							'desc' => __( 'Link target. blank - link will be opened in new window/tab', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => '',
					'desc' => __( 'Permalink to specified post/page', 'perch' ),
					'icon' => 'link'
				),
				// members
				'members' => array(
					'name' => __( 'Members', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'message' => array(
							'default' => __( 'This content is for registered users only. Please %login%.', 'perch' ),
							'name' => __( 'Message', 'perch' ), 'desc' => __( 'Message for not logged users', 'perch' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#ffcc00',
							'name' => __( 'Box color', 'perch' ), 'desc' => __( 'This color will applied only to box for not logged users', 'perch' )
						),
						'login_text' => array(
							'default' => __( 'login', 'perch' ),
							'name' => __( 'Login link text', 'perch' ), 'desc' => __( 'Text for the login link', 'perch' )
						),
						'login_url' => array(
							'default' => wp_login_url(),
							'name' => __( 'Login link url', 'perch' ), 'desc' => __( 'Login link url', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Content for logged members', 'perch' ),
					'desc' => __( 'Content for logged in members only', 'perch' ),
					'icon' => 'lock'
				),
				// guests
				'guests' => array(
					'name' => __( 'Guests', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Content for guests', 'perch' ),
					'desc' => __( 'Content for guests only', 'perch' ),
					'icon' => 'user'
				),
				// feed
				'feed' => array(
					'name' => __( 'RSS Feed', 'perch' ),
					'type' => 'single',
					'group' => 'content other',
					'atts' => array(
						'url' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url to RSS-feed', 'perch' )
						),
						'limit' => array(
							'type' => 'slider',
							'min' => 1,
							'max' => 20,
							'step' => 1,
							'default' => 3,
							'name' => __( 'Limit', 'perch' ), 'desc' => __( 'Number of items to show', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Feed grabber', 'perch' ),
					'icon' => 'rss'
				),
				// document
				'document' => array(
					'name' => __( 'Document', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'url' => array(
							'type' => 'upload',
							'default' => '',
							'name' => __( 'Url', 'perch' ),
							'desc' => __( 'Url to uploaded document. Supported formats: doc, xls, pdf etc.', 'perch' )
						),
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Viewer width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Viewer height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make viewer responsive', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Document viewer by Google', 'perch' ),
					'icon' => 'file-text'
				),
				// gmap
				'map' => array(
					'name' => __( 'MAP', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						
						'latitude' => array(
							'values' => '',
							'default' => '51.507207',
							'name' => __( 'Latitude', 'perch' ),
							'desc' => __( 'Get Latitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'perch' )
						),
						'longitude' => array(
							'default' => '-0.127223',
							'name' => __( 'Longitude', 'perch' ),
							'desc' => __( 'Get Longitude value from this <a href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm" target="_blank">site</a>.', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 10,
							'default' => 280,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Map height', 'perch' )
						),
						'control' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Control', 'perch' ),
							'desc' => ''
						),
						'zoom' => array(
							'type' => 'slider',
							'min' => 3,
							'max' => 40,
							'step' => 1,
							'default' => 16,
							'name' => __( 'Zoom', 'perch' ),
							'desc' => __( 'Map height', 'perch' )
						),
						'mapcolor' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Map Custom Color', 'perch' ),
							'desc' => ''
						),
					),
					'desc' => __( 'Maps by Google', 'perch' ),
					'icon' => 'map-marker'
				),
				// gmap
				'gmap' => array(
					'name' => __( 'Gmap', 'perch' ),
					'type' => 'single',
					'group' => 'media',
					'atts' => array(
						'width' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 600,
							'name' => __( 'Width', 'perch' ),
							'desc' => __( 'Map width', 'perch' )
						),
						'height' => array(
							'type' => 'slider',
							'min' => 200,
							'max' => 1600,
							'step' => 20,
							'default' => 400,
							'name' => __( 'Height', 'perch' ),
							'desc' => __( 'Map height', 'perch' )
						),
						'responsive' => array(
							'type' => 'bool',
							'default' => 'yes',
							'name' => __( 'Responsive', 'perch' ),
							'desc' => __( 'Ignore width and height parameters and make map responsive', 'perch' )
						),
						'address' => array(
							'values' => array( ),
							'default' => '',
							'name' => __( 'Marker', 'perch' ),
							'desc' => __( 'Address for the marker. You can type it in any language', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Maps by Google', 'perch' ),
					'icon' => 'globe'
				),
				// posts
				'posts' => array(
					'name' => __( 'Posts', 'tp' ),
					'type' => 'single',
					'group' => 'other',
					'atts' => array(
						'template' => array(
							'default' => 'templates/default-loop.php', 'name' => __( 'Template', 'tp' ),
							'desc' => __( '<b>Do not change this field value if you do not understand description below.</b><br/>Relative path to the template file. Default templates is placed under the plugin directory (templates folder). You can copy it under your theme directory and modify as you want. You can use following default templates that already available in the plugin directory:<br/><b%value>templates/default-loop.php</b> - posts loop<br/><b%value>templates/teaser-loop.php</b> - posts loop with thumbnail and title<br/><b%value>templates/single-post.php</b> - single post template<br/><b%value>templates/list-loop.php</b> - unordered list with posts titles', 'tp' )
						),
						'id' => array(
							'default' => '',
							'name' => __( 'Post ID\'s', 'tp' ),
							'desc' => __( 'Enter comma separated ID\'s of the posts that you want to show', 'tp' )
						),
						'posts_per_page' => array(
							'type' => 'number',
							'min' => -1,
							'max' => 10000,
							'step' => 1,
							'default' => get_option( 'posts_per_page' ),
							'name' => __( 'Posts per page', 'tp' ),
							'desc' => __( 'Specify number of posts that you want to show. Enter -1 to get all posts', 'tp' )
						),
						'post_type' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Tp_Tools::get_types(),
							'default' => 'post',
							'name' => __( 'Post types', 'tp' ),
							'desc' => __( 'Select post types. Hold Ctrl key to select multiple post types', 'tp' )
						),
						'taxonomy' => array(
							'type' => 'select',
							'values' => Tp_Tools::get_taxonomies(),
							'default' => 'category',
							'name' => __( 'Taxonomy', 'tp' ),
							'desc' => __( 'Select taxonomy to show posts from', 'tp' )
						),
						'tax_term' => array(
							'type' => 'select',
							'multiple' => true,
							'values' => Tp_Tools::get_terms( 'category' ),
							'default' => '',
							'name' => __( 'Terms', 'tp' ),
							'desc' => __( 'Select terms to show posts from', 'tp' )
						),
						'tax_operator' => array(
							'type' => 'select',
							'values' => array( 'IN', 'NOT IN', 'AND' ),
							'default' => 'IN', 'name' => __( 'Taxonomy term operator', 'tp' ),
							'desc' => __( 'IN - posts that have any of selected categories terms<br/>NOT IN - posts that is does not have any of selected terms<br/>AND - posts that have all selected terms', 'tp' )
						),
						// 'author' => array(
						// 	'type' => 'select',
						// 	'multiple' => true,
						// 	'values' => Tp_Tools::get_users(),
						// 	'default' => 'default',
						// 	'name' => __( 'Authors', 'tp' ),
						// 	'desc' => __( 'Choose the authors whose posts you want to show. Enter here comma-separated list of users (IDs). Example: 1,7,18', 'tp' )
						// ),
						'author' => array(
							'default' => '',
							'name' => __( 'Authors', 'tp' ),
							'desc' => __( 'Enter here comma-separated list of author\'s IDs. Example: 1,7,18', 'tp' )
						),
						'meta_key' => array(
							'default' => '',
							'name' => __( 'Meta key', 'tp' ),
							'desc' => __( 'Enter meta key name to show posts that have this key', 'tp' )
						),
						'offset' => array(
							'type' => 'number',
							'min' => 0,
							'max' => 10000,
							'step' => 1, 'default' => 0,
							'name' => __( 'Offset', 'tp' ),
							'desc' => __( 'Specify offset to start posts loop not from first post', 'tp' )
						),
						'order' => array(
							'type' => 'select',
							'values' => array(
								'desc' => __( 'Descending', 'tp' ),
								'asc' => __( 'Ascending', 'tp' )
							),
							'default' => 'DESC',
							'name' => __( 'Order', 'tp' ),
							'desc' => __( 'Posts order', 'tp' )
						),
						'orderby' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'tp' ),
								'id' => __( 'Post ID', 'tp' ),
								'author' => __( 'Post author', 'tp' ),
								'title' => __( 'Post title', 'tp' ),
								'name' => __( 'Post slug', 'tp' ),
								'date' => __( 'Date', 'tp' ), 'modified' => __( 'Last modified date', 'tp' ),
								'parent' => __( 'Post parent', 'tp' ),
								'rand' => __( 'Random', 'tp' ), 'comment_count' => __( 'Comments number', 'tp' ),
								'menu_order' => __( 'Menu order', 'tp' ), 'meta_value' => __( 'Meta key values', 'tp' ),
							),
							'default' => 'date',
							'name' => __( 'Order by', 'tp' ),
							'desc' => __( 'Order posts by', 'tp' )
						),
						'post_parent' => array(
							'default' => '',
							'name' => __( 'Post parent', 'tp' ),
							'desc' => __( 'Show childrens of entered post (enter post ID)', 'tp' )
						),
						'post_status' => array(
							'type' => 'select',
							'values' => array(
								'publish' => __( 'Published', 'tp' ),
								'pending' => __( 'Pending', 'tp' ),
								'draft' => __( 'Draft', 'tp' ),
								'auto-draft' => __( 'Auto-draft', 'tp' ),
								'future' => __( 'Future post', 'tp' ),
								'private' => __( 'Private post', 'tp' ),
								'inherit' => __( 'Inherit', 'tp' ),
								'trash' => __( 'Trashed', 'tp' ),
								'any' => __( 'Any', 'tp' ),
							),
							'default' => 'publish',
							'name' => __( 'Post status', 'tp' ),
							'desc' => __( 'Show only posts with selected status', 'tp' )
						),
						'ignore_sticky_posts' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Ignore sticky', 'tp' ),
							'desc' => __( 'Select Yes to ignore posts that is sticked', 'tp' )
						),
						'readmore_text' => array(
							'default' => '',
							'name' => __( 'Read more text', 'tp' ),
							'desc' => __( 'Leave blank to avoid read more button. Only applied for default-loop.php', 'tp' )
						)
					),
					'desc' => __( 'Custom posts query with customizable template', 'tp' ),
					'icon' => 'th-list'
				),
				// animate
				'animate' => array(
					'name' => __( 'Animation', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'type' => array(
							'type' => 'select',
							'values' => array_combine( self::animations(), self::animations() ),
							'default' => 'bounceIn',
							'name' => __( 'Animation', 'perch' ),
							'desc' => __( 'Select animation type', 'perch' )
						),
						'duration' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 1,
							'name' => __( 'Duration', 'perch' ),
							'desc' => __( 'Animation duration (seconds)', 'perch' )
						),
						'delay' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 20,
							'step' => 0.5,
							'default' => 0,
							'name' => __( 'Delay', 'perch' ),
							'desc' => __( 'Animation delay (seconds)', 'perch' )
						),
						'inline' => array(
							'type' => 'bool',
							'default' => 'no',
							'name' => __( 'Inline', 'perch' ),
							'desc' => __( 'This parameter determines what HTML tag will be used for animation wrapper. Turn this option to YES and animated element will be wrapped in SPAN instead of DIV. Useful for inline animations, like buttons', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'content' => __( 'Animated content', 'perch' ),
					'desc' => __( 'Wrapper for animation. Any nested element will be animated', 'perch' ),
					'example' => 'animations',
					'icon' => 'bolt'
				),
// qrcode
				'qrcode' => array(
					'name' => __( 'QR code', 'perch' ),
					'type' => 'single',
					'group' => 'content',
					'atts' => array(
						'data' => array(
							'default' => '',
							'name' => __( 'Data', 'perch' ),
							'desc' => __( 'The text to store within the QR code. You can use here any text or even URL', 'perch' )
						),
						'title' => array(
							'default' => '',
							'name' => __( 'Title', 'perch' ),
							'desc' => __( 'Enter here short description. This text will be used in alt attribute of QR code', 'perch' )
						),
						'size' => array(
							'type' => 'slider',
							'min' => 10,
							'max' => 1000,
							'step' => 10,
							'default' => 200,
							'name' => __( 'Size', 'perch' ),
							'desc' => __( 'Image width and height (in pixels)', 'perch' )
						),
						'margin' => array(
							'type' => 'slider',
							'min' => 0,
							'max' => 50,
							'step' => 5,
							'default' => 0,
							'name' => __( 'Margin', 'perch' ),
							'desc' => __( 'Thickness of a margin (in pixels)', 'perch' )
						),
						'align' => array(
							'type' => 'select',
							'values' => array(
								'none' => __( 'None', 'perch' ),
								'left' => __( 'Left', 'perch' ),
								'center' => __( 'Center', 'perch' ),
								'right' => __( 'Right', 'perch' ),
							),
							'default' => 'none',
							'name' => __( 'Align', 'perch' ),
							'desc' => __( 'Choose image alignment', 'perch' )
						),
						'link' => array(
							'default' => '',
							'name' => __( 'Link', 'perch' ),
							'desc' => __( 'You can make this QR code clickable. Enter here the URL', 'perch' )
						),
						'target' => array(
							'type' => 'select',
							'values' => array(
								'self' => __( 'Open link in same window/tab', 'perch' ),
								'blank' => __( 'Open link in new window/tab', 'perch' ),
							),
							'default' => 'blank',
							'name' => __( 'Link target', 'perch' ),
							'desc' => __( 'Select link target', 'perch' )
						),
						'color' => array(
							'type' => 'color',
							'default' => '#000000',
							'name' => __( 'Primary color', 'perch' ),
							'desc' => __( 'Pick a primary color', 'perch' )
						),
						'background' => array(
							'type' => 'color',
							'default' => '#ffffff',
							'name' => __( 'Background color', 'perch' ),
							'desc' => __( 'Pick a background color', 'perch' )
						),
						'class' => array(
							'default' => '',
							'name' => __( 'Class', 'perch' ),
							'desc' => __( 'Extra CSS class', 'perch' )
						)
					),
					'desc' => __( 'Advanced QR code generator', 'perch' ),
					'icon' => 'qrcode'
				),
				// scheduler
				'scheduler' => array(
					'name' => __( 'Scheduler', 'perch' ),
					'type' => 'wrap',
					'group' => 'other',
					'atts' => array(
						'time' => array(
							'default' => '',
							'name' => __( 'Time', 'perch' ),
							'desc' => sprintf( __( 'In this field you can specify one or more time ranges. Every day at this time the content of shortcode will be visible. %s %s %s - show content from 9:00 to 18:00 %s - show content from 9:00 to 13:00 and from 14:00 to 18:00 %s - example with minutes (content will be visible each day, 45 minutes) %s - example with seconds', 'perch' ), '<br><br>', __( 'Examples (click to set)', 'perch' ), '<br><b%value>9-18</b>', '<br><b%value>9-13, 14-18</b>', '<br><b%value>9:30-10:15</b>', '<br><b%value>9:00:00-17:59:59</b>' )
						),
						'days_week' => array(
							'default' => '',
							'name' => __( 'Days of the week', 'perch' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the week. Every week at these days the content of shortcode will be visible. %s 0 - Sunday %s 1 - Monday %s 2 - Tuesday %s 3 - Wednesday %s 4 - Thursday %s 5 - Friday %s 6 - Saturday %s %s %s - show content from Monday to Friday %s - show content only at Sunday %s - show content at Sunday and from Wednesday to Friday', 'perch' ), '<br><br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br>', '<br><br>', __( 'Examples (click to set)', 'perch' ), '<br><b%value>1-5</b>', '<br><b%value>0</b>', '<br><b%value>0, 3-5</b>' )
						),
						'days_month' => array(
							'default' => '',
							'name' => __( 'Days of the month', 'perch' ),
							'desc' => sprintf( __( 'In this field you can specify one or more days of the month. Every month at these days the content of shortcode will be visible. %s %s %s - show content only at first day of month %s - show content from 1th to 5th %s - show content from 10th to 15th and from 20th to 25th', 'perch' ), '<br><br>', __( 'Examples (click to set)', 'perch' ), '<br><b%value>1</b>', '<br><b%value>1-5</b>', '<br><b%value>10-15, 20-25</b>' )
						),
						'months' => array(
							'default' => '',
							'name' => __( 'Months', 'perch' ),
							'desc' => sprintf( __( 'In this field you can specify the month or months in which the content will be visible. %s %s %s - show content only in January %s - show content from February to June %s - show content in January, March and from May to July', 'perch' ), '<br><br>', __( 'Examples (click to set)', 'perch' ), '<br><b%value>1</b>', '<br><b%value>2-6</b>', '<br><b%value>1, 3, 5-7</b>' )
						),
						'years' => array(
							'default' => '',
							'name' => __( 'Years', 'perch' ),
							'desc' => sprintf( __( 'In this field you can specify the year or years in which the content will be visible. %s %s %s - show content only in 2014 %s - show content from 2014 to 2016 %s - show content in 2014, 2018 and from 2020 to 2022', 'perch' ), '<br><br>', __( 'Examples (click to set)', 'perch' ), '<br><b%value>2014</b>', '<br><b%value>2014-2016</b>', '<br><b%value>2014, 2018, 2020-2022</b>' )
						),
						'alt' => array(
							'default' => '',
							'name' => __( 'Alternative text', 'perch' ),
							'desc' => __( 'In this field you can type the text which will be shown if content is not visible at the current moment', 'perch' )
						)
					),
					'content' => __( 'Scheduled content', 'perch' ),
					'desc' => __( 'Allows to show the content only at the specified time period', 'perch' ),
					'note' => __( 'This shortcode allows you to show content only at the specified time.', 'perch' ) . '<br><br>' . __( 'Please pay special attention to the descriptions, which are located below each text field. It will save you a lot of time', 'perch' ) . '<br><br>' . __( 'By default, the content of this shortcode will be visible all the time. By using fields below, you can add some limitations. For example, if you type 1-5 in the Days of the week field, content will be only shown from Monday to Friday. Using the same principles, you can limit content visibility from years to seconds.', 'perch' ),
					'icon' => 'clock-o'
				),
			) );	

		$social = array();
		for($i=1; $i<=6; $i++){
			$social['icon'.$i] =  array(
							'default' => '',
							'type' => 'icon',
							'name' => __('Icon #'.$i, 'perch'),
							'desc' => __('', 'perch')
						);
			$social['title'.$i] =  array(
							'default' => '',
							'name' => __('Title #'.$i, 'perch'),
							'desc' => __('', 'perch')
						);
			$social['url'.$i] = array(
							'default' => 'http://themeperch.net',
							'name' => __('URL #'.$i, 'perch'),
							'desc' => __('', 'perch'),
						);
		}
		$shortcodes['social']['atts'] = 	array_merge($shortcodes['social']['atts'], $social);	

					

				
		// Return result
		return ( is_string( $shortcode ) ) ? $shortcodes[sanitize_text_field( $shortcode )] : $shortcodes;
	}
}

class perch_Shortcodes_Data extends Tp_Data {
	function __construct() {
		parent::__construct();
	}
}
