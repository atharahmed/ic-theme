<?php

/*
URL Scrubber class updates the urls in the posts meta table. This class helps circumvent the issues
created by trying to scrub urls stored inside of serialized object strings.
*/
class URLScrubber
{
    // urls
    protected $oldUrl;
    protected $newUrl;

    // db
    protected $wpdb;

    // old url regex
    protected $pattern;
    protected $queryPattern;

    public function __construct($oldUrl, $newUrl)
    {
        // grab reference to wpdb object
        global $wpdb;
        $this->wpdb = $wpdb;

        // store urls
        $this->oldUrl = $oldUrl;
        $this->newUrl = $newUrl;

        // create regex pattern out of old url
        $this->pattern = "/" . preg_quote($this->oldUrl, '/') . "/";

        // perform query and update urls
        $this->updatePostMeta();
        $this->updateOptions();
    }

    public function updatePostMeta()
    {
        // create post meta query
        $queryPattern = '%' . $this->oldUrl . '%';
        $query = $this->wpdb->prepare("
          select post_id, meta_key
          from icwpdb_postmeta
          where meta_value like %s
        ", $queryPattern);

        // execute the query
        $queryResults = $this->wpdb->get_results($query);

        // create mutli-dimensional array with key = post_id and value = array of meta_keys
        $postsMetaInfo = array();
        foreach ($queryResults as $result) {
            $pid = $result->post_id;

            // grab meta keys array associated with the post
            if (!isset($postsMetaInfo[$pid])) { $postsMetaInfo[$pid] = array(); }
            $postMetaKeys = $postsMetaInfo[$pid];

            // add meta key to array
            array_push($postMetaKeys, $result->meta_key);
            $postsMetaInfo[$pid] = $postMetaKeys;
        }

        // loop through posts and update post meta
        foreach ($postsMetaInfo as $pid => $metaKeys) {
            // loop through keys for post and update associated meta recursively
            foreach ($metaKeys as $index => $metaKey) {
                $metaValue = get_post_meta($pid, $metaKey, true);
                //echo "<li>before: " . esc_html(json_encode($metaValue)) . "</li>";
                $metaValue = $this->replaceRec($metaValue, $this->pattern, $this->newUrl);
                //echo "<li>after: " . esc_html(json_encode($metaValue)) . "</li>";
                update_post_meta($pid, $metaKey, $metaValue);
            }
        }
    }

    public function updateOptions()
    {
        $queryPattern = '%' . $this->oldUrl . '%';
        $query = $this->wpdb->prepare("
          select option_name
          from icwpdb_options
          where option_value like %s
        ", $queryPattern);

        $queryResults = $this->wpdb->get_results($query);

        foreach ($queryResults as $result) {
            $optionName = $result->option_name;
            $optionValue = get_option($optionName);
            //echo "<li>before: " . esc_html(json_encode($optionValue)) . "</li>";
            $optionValue = $this->replaceRec($optionValue, $this->pattern, $this->newUrl);
            //echo "<li>after:" . esc_html(json_encode($optionValue)) . "</li>";
            update_option($optionName, $optionValue);
        }
    }

    private function replaceRec($subject, $pattern, $replacement)
    {
        if (is_string($subject)) {
            $numMatches = preg_match($pattern, $subject);
            if (!empty($numMatches)) {
                return preg_replace($pattern, $replacement, $subject);
            }
            else {
                return $subject;
            }
        }
        else if (is_array($subject)) {
            $rVal = array();
            foreach ($subject as $subKey => $subValue) {
                //$subKey = $this->replaceRec($subKey, $pattern, $replacement);
                $rVal[$subKey] = $this->replaceRec($subValue, $pattern, $replacement);
            }

            return $rVal;
        }
    }
}

?>