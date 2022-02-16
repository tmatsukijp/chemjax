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
 * chemjaxpv of Atto editor content
 *
 * @package   atto_chemjaxpv
 * @copyright 2018 Kenichi Miura
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../../../../config.php');

$contextid = required_param('contextid', PARAM_INT);

$PAGE->set_url('/lib/editor/atto/plugins/chemjaxpv/notation.php');

list($context, $course, $cm) = get_context_info_array($contextid);
$PAGE->set_context($context);

require_login($course, false, $cm);

$PAGE->requires->jquery();
//require_once($CFG->dirroot.'/filter/mathjaxloader/filter.php');

// Reset page layout for inside editor.
$PAGE->set_pagelayout('print');
$PAGE->requires->css('/lib/editor/atto/plugins/chemjaxpv/styles.css');
//$PAGE->set_pagelayout(get_config('atto_chemjaxpv', 'layout'));

print $OUTPUT->header();
?>

<div class="container">

    <section id="No00">
      <div class="page-header">
        <h3 id="headings" style="color:#00acdf">化学構造式フィルタプラグイン</h3><h1 style="color:#00acdf"><b>ChemJax</b>の書き方</h1>
      </div>
    </section>

    <section id="No1" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">簡単な記述例</h2>
      <pre>\cjx{CH_3 -CH (#[2]CH_3) -CH_2 -C (=[:60]O) -[:-60]O -H}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig1.png">
      </div>
    </section>

    <section id="No2" style="padding-top:0">
      <h2 id="headings" style="color:#00acdf"><b>chemjax</b>コマンドの基本</h2>
      <div>
        <h2 style="border-top:2px solid green;border-bottom:2px solid green">結合のオプション</h2>
        <pre>-[角度,長さの倍率,結合元原子の番号,結合先原子の番号]</pre>
        <div class="bs-docs-example">
          <ul>
            <li><h3>オプション指定の仕様</h3>
            必要なオプションまで指定すれば，その先は省略可能です。例えば，-[4,2] とすれば，角度と長さの倍率までを指定したことになります。
            途中のオプションを省略したい場合は，-[,,1,2] のように空のコンマを入れます。
            </li>
            <li><h3>結合の種類の指定</h3></li>
            <li><span>単結合　</span>： -</li>
            <li><span>二重結合</span>： =</li>
            <li><span>三重結合</span>： #</li>
          </ul>
          <ul style="list-style-type:square">
            <li><h3 style="color:#00acdf">改行：\\</h3></li>
            <li>（例）<span style="color:#d4003a">\cjx{CH3 -CH} \\ \cjx{-CH_2 -C (=[:60]O) -[:-60]O -H}</span></li>
          </ul>
        </div>
      </div>
    </section>

    <section id="No2" style="padding-top:0">
      <h2 class="sub" style="border-top:2px solid green;border-bottom:2px solid green">第1オプション：角度の指定</h2>
      <div class="bs-docs-example sub">
        <ul>
          <li><span>45° の倍数</span>による指定：90° であれば [2]</li>
          <li><span>絶対角度</span>による指定：90°であれば [:90]</li>
          <li><span>相対角度</span>による指定：30°であれば [::30]</li>
        </ul>
      </div>
    </section>

    <section id="No2" style="padding-top:0">
      <h2 class="sub2" style="border-top:2px solid green;border-bottom:2px solid green">相対角度指定</h2>
      <pre class="sub2">\cjx{C -C -[<span>::20</span>]C -[<span>::20</span>]C -[<span>::20</span>]C}</pre>
        <div class="bs-docs-example sub2">
          <h5>-[<span>角度</span>,長さの倍率,結合元原子の番号,結合先原子の番号]</h5>
          <img src="pix/fig2.png">
        </div>
    </section>

    <section id="No5" style="padding-top:0">
      <h2 class="sub" style="border-top:2px solid green;border-bottom:2px solid green">第2オプション：結合の長さ倍率</h2>
      <pre class="sub">\cjx{CH_3 -[,<span>2</span>]CH (-[2,<span>1.5</span>]CH3) -CH2^2+ -C (=[:30]O) -[:-60]O -H}</pre>
      <div class="bs-docs-example sub">
        <h5>-[角度,<span>長さの倍率</span>,結合元原子の番号,結合先原子の番号]</h5>
        <img src="pix/fig3.png">
      </div>
    </section>

    <section id="No3" style="padding-top:0">
      <h2 class="sub" style="border-top:2px solid green;border-bottom:2px solid green">第3，第4オプション：結合原子の指定</h2>
      <pre class="sub">\cjx{CH_3CH_2 -[:-90,,<span>3</span>]OH}</pre>
      <div class="bs-docs-example sub">
        <h5>-[角度,長さの倍率,結合元原子の番号,<span>結合先原子の番号</span>]</h5>
        <img src="pix/fig4.png">
      </div>
    </section>

    <section id="No4" style="padding-top:0">
      <h2 class="sub" style="border-top:2px solid green;border-bottom:2px solid green">枝分かれの記述</h2>
      <pre class="sub">\cjx{CH_3 -CH <span>(</span>-[2]CH <span style="color:#009933">(</span>-CH3<span style="color:#009933">)</span> -[2]CH3<span>)</span> -CH3}</pre>
      <div class="bs-docs-example sub">
        <h5><span>（</span>...<span>）</span>で枝分かれ</h5>
        <img src="pix/fig5.png">
      </div>
    </section>

    <section id="No6" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">炭素原子の省略</h2>
      <pre>\cjx{-[:-30] -[::60] (=[2]O) -[::-60] =[::60] (-[::60]) -[::-60]}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig6.png">
      </div>
    </section>

    <section id="No7" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">環状構造の記述</h2>
      <pre>\cjx{H2C (-[-2,,2,2]H2C -[0]CH2 -[2]CH2) -CH2}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig7.png">
      </div>
    </section>

    <section id="No8" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">複数の環状構造を持つ分子</h2>
      <p>デュワーベンゼンの例です。</p>
      <pre>\cjx{C =[6]C -[::60]C -[::60]C =[::60]C -[::60]C (-[-2,2]\phantom{X}) -[::60]\phantom{X}}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig8.png">
      </div>
    </section>

    <section id="No9" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">正多角形の環状構造を持つ分子</h2>
      <pre>\cjx{<span>-[:-30]</span> <span style="color:#009933">=[::60]</span> -[::60] =[::60] -[::60] =[::60]}</pre><pre>\cjx{<span>-[:-60]</span> <span style="color:#009933">=[::60]</span> -[::60] =[::60] -[::60] =[::60]}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig9x.png">
      </div>
    </section>

    <section id="No10" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">全体の回転角の指定</h2>
      <p>上のベンゼンを -30°回転した例です。</p>
      <pre>\cjx{<span>-[:-30,0]</span> -[::-30] =[::60] -[::60] =[::60] -[::60] =[::60]}</pre><pre>\cjx{<span>-[:-30,0]</span> -[::-60] =[::60] -[::60] =[::60] -[::60] =[::60]}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig10x.png">
      </div>
    </section>

    <section id="No11" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green">環から環や枝を伸ばす</h2>
      <pre>\cjx{<span>\vphantom{X}</span> <span style="color:#009933">=[:0]</span> -[::60] (-[::-60,0.7]N =[,0.5]N -[,0.7] -[::-60] (-[::-60] =[::60] -[::60] -[::60] -[::60]) =[::60] -[::60] =[::60] -[::60] (-[::-60]HO) =[::60]) =[::60] -[::60] =[::60] -[::60]}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig11x.png">
      </div>
    </section>

    <section id="No12" style="padding-top:0">
      <h2 style="border-top:2px solid green;border-bottom:2px solid green"></h2>
      <pre>\cjx{<span>\vphantom{X}</span> <span style="color:#009933">=[:-30]</span> -[::60] (-[:-18]NH -[::72,,1] =[::72] (-[::-72]CH2 -[2]CH (-[4]H2N\phantom{X}\phantom{X}) -[0]COOH) -[::72]) =[::60]  -[::60] =[::60] -[::60]}</pre>
      <div class="bs-docs-example">
        <img src="pix/fig12x.png">
      </div>
    </section>
  </div>
</div>

<?php
print $OUTPUT->footer();
