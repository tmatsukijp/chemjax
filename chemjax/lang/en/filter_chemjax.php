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

/**
 * Strings for component 'filter_chemjax', language 'en'
 *
 * @package   filter_chemjax
 * @copyright 2017 Kenichi Miura  (miura-k@tokyo-kasei.ac.jp)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['filtername'] = 'ChemJax';
$string['bondlen'] = 'Length of bonds';
$string['bondlen_desc'] = 'Any numeric to bonds length in millimeter';
$string['chemjaxsettings'] = 'ChemJax configuration';
$string['chemjaxsettings_desc'] = 'The ChemJax configuration should be added into the MathJax configuration like the <span class="chemjaxconf">color text part</span> below.';
$string['description'] = '
<pre class="chemjaxfrm">
  <span class="chemjaxconf">MathJax.Ajax.config.path["ChemJax"] = "http(s)://<span style="font-style:italic">Your Moodle Site</span>/filter/chemjax/unpacked/extensions/TeX";</span>

  MathJax.Hub.Config({
    config: ["Accessible.js", "Safe.js"],
    errorSettings: { message: ["!"] },
    skipStartupTypeset: true,
    messageStyle: "none"<span class="chemjaxconf">,

    "HTML-CSS": {
        styles: {".MathJax .xypic svg": {"vertical-align": "baseline"}}
    },
    TeX: {
      extensions: ["[ChemJax]/chemfig3.js", "[ChemJax]/xypic.js", "AMSmath.js",
                   "AMSsymbols.js", "noErrors.js", "noUndefined.js"]
    }</span>
  });
</pre>
';
$string['chemjaxoptions'] = 'ChemJax options';
