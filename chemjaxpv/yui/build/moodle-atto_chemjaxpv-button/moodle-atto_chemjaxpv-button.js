YUI.add('moodle-atto_chemjaxpv-button', function (Y, NAME) {

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

/*
 * @package    atto_chemjaxpv
 * @copyright  2018 Kenichi Miura <kenmiu3@gmail.co.jp>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @module moodle-atto_chemjaxpv-button
 */

/**
 * Atto text editor chemjaxpv plugin.
 *
 * @namespace M.atto_chemjaxpv
 * @class button
 * @extends M.editor_atto.EditorPlugin
 */

require(['jquery'], function($) {

    var CHEMJAXPVNAME = 'ChemJaxPreview'

    var notationwindow;
    var id_editor = $('textarea.form-control').attr('id');
    var preview_window = '<button id="btn_example" class="btn btn-primary" style="display:block;margin:1rem 0 0 auto">' + notation + '</button>' + 
                         '<div id="preview_window" class="border-primary" style="border:2px solid red; min-height:200px; margin-top:0"></div>';
    var $preview = $('<div id="preview">' + preview_window + '</div>');

    $('button.atto_chemjaxpv_button').each(function(i) {
        if (i>0) {;
            $(this).hide();
        }
    });
    $('#'+id_editor).after($preview);
    $('#preview').hide();

    $('#btn_example').on('click', function(e) {
        e.preventDefault();
        var param = ctxid;
        this.href = notationurl + param;
        if (!notationwindow || notationwindow.closed) {
            if (displaytype == 'newtab') { //-- Open Tab
                notationwindow = window.open(this.href, 'chamjaxnotation');
            } else { //-- Open Popup
                notationwindow = window.open(this.href, 'chemjaxnotation', "width=600,height=500,resizable=yes,scrollbars=yes");
            }
        }
        return false;
    });

    $('.atto_chemjaxpv_button').on('click', function() {
        $(this).toggleClass('highlight');
        $('#preview').toggle();
        makePreview();
        if (notationwindow || !notationwindow.closed) {
            notationwindow.close();
        }
    }); 

    $('body').on('keyup change', '#'+id_editor, function(){
        makePreview();
    });

    function makePreview() {
        //input = $('#'+id_editor).val().replace(/</g, "&lt;").replace(/>/g, "&gt;");
        input = $('#'+id_editor).val();
        $('#preview_window').html(input);
        MathJax.Hub.Queue(["Typeset", MathJax.Hub, "preview_window"]);
    }

});

var PLUGINNAME = 'atto_chemjaxpv',
    STATE = false;

Y.namespace('M.atto_chemjaxpv').Button = Y.Base.create('button', Y.M.editor_atto.EditorPlugin, [], {
    initializer: function() {
        var button = this.addButton({
            icon: 'chemjax',
            iconComponent: PLUGINNAME,
            //callback: this._toggle
            callback: this._getContext
        });
        button.set('title', M.util.get_string('pluginname', PLUGINNAME));
        notation = M.util.get_string('notation', PLUGINNAME);
        displaytype = this.get('displaytype');
        ctxid = '?contextid=' + this.get('contextid');
        notationurl = this.get('notationurl');
    },

}, {
    ATTRS: {
        /**
         * The url to use when loading the notation.
         *
         * @attribute previewurl
         * @type String
         */
        notationurl: {
            value: null
        },

        /**
         * The contextid to use when generating this chemjaxpv.
         *
         * @attribute contextid
         * @type String
         */
        contextid: {
            value: null
        },

        /**
         * The displaytype to use when opening the notation window.
         *
         * @attribute displaytype
         * @type String
         */
        displaytype: {
            value: null
        },
    }
});


}, '@VERSION@', {"requires": ["moodle-editor_atto-plugin"]});

