<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_tuchsoft;


use core\hook\output\before_footer_html_generation;
use core\hook\output\before_standard_head_html_generation;


/**
 * Hook callbacks for the local tuchsoft plugin
 *
 * @package local_tuchsoft
 * @copyright 2025 TuchSoft <https://tuchsoft.com>
 * @author Mattia Bonzi <mattia@tuchsoft.com>
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Add tuchsoft link at the end of the footer
     * @param before_footer_html_generation $hook
     * @return void
     */
    public static function before_footer_html_generation(before_footer_html_generation $hook): void {
        $hook->add_html("
        <div style='font-size: 0.8em;'>
            <a style='filter: grayscale(1); text-decoration: unset;' href='https://tuchsoft.com'>
                Built by <span style='text-decoration: underline;'>TuchSoft</span>
            </a>
        </div>
    ");
    }

    /**
     * Add tuchsoft strctured data in the head of the page
     * @param before_standard_head_html_generation $hook
     * @return void
     */
    public static function before_standard_head_html_generation(before_standard_head_html_generation $hook): void {
        global $CFG, $SITE, $PAGE;

        $schema_data = <<<JSON_LD_BLOCK
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "$PAGE->title",
  "url": "$PAGE->url",

  
  "creator": {
    "@type": "Organization",
    "name": "TuchSoft",
    "@id": "https://tuchsoft.com"
  },

  "mainEntity": {
    "@type": "WebApplication",
    "name": "$SITE->fullname",
    "operatingSystem": "All",
    "description": "$SITE->summary",
    "softwareVersion": "$CFG->version",
    "provider": { "@id": "https://tuchsoft.com" }
  }
}
</script>
JSON_LD_BLOCK;

        $hook->add_html($schema_data);
    }

}
