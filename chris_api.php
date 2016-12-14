<?php

class ChrisApi {

    private static $details = array();

    public static function init($details, $social, $miscellaneous) {
        ChrisApi::$details['details'] = ChrisApi::fetchJSON($details);
        ChrisApi::$details['social'] = ChrisApi::fetchJSON($social);
        ChrisApi::$details['miscellaneous'] = ChrisApi::fetchJSON($miscellaneous);
    }

    public static function fetchJSON($string) {
        return json_decode($string, true);
    }

    public static function name() {
        return ChrisApi::$details['details']['name'];
    }

    public static function location() {
        return ChrisApi::$details['details']['location'];
    }

    public static function description() {
        return ChrisApi::$details['details']['description'];
    }

    public static function availability() {
        return ChrisApi::$details['details']['availability'];
    }

    public static function resume() {
        return ChrisApi::$details['details']['resume'];
    }

    public static function blogTitle() {
        return ChrisApi::$details['details']['blogTitle'];
    }

    public static function blogExcerpt() {
        return ChrisApi::$details['details']['blogExcerpt'];
    }

    public static function blogUrl() {
        return ChrisApi::$details['details']['blogUrl'];
    }

    public static function picture() {
        return ChrisApi::$details['details']['picture'];
    }

    /* SOCIAL */

    public static function tweet() {
        return ChrisApi::$details['social']['tweet'];
    }

    public static function twitter() {
        return ChrisApi::$details['social']['twitter'];
    }

    public static function linkedin() {
        return ChrisApi::$details['social']['linkedin'];
    }

    public static function github() {
        return ChrisApi::$details['social']['github'];
    }

    /* MISCELLANEOUS */

    public static function codingDays() {
        return ChrisApi::$details['miscellaneous']['codingDays'];
    }

    public static function daysUntilGraduation() {
        return ChrisApi::$details['miscellaneous']['daysUntilGraduation'];
    }

    public static function apiLastUpdated() {
        return date("dS M, g:ia", ChrisApi::$details['miscellaneous']['apiLastUpdated']);
    }
}
