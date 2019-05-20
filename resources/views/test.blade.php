<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Strona testowa :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

<nav role="navigation">
        <ul>
          <li>
            <a href="#text">Text</a>
            <ul>
              <li><a href="#text__headings">Headings</a></li>
              <li><a href="#text__paragraphs">Paragraphs</a></li>
              <li><a href="#text__blockquotes">Blockquotes</a></li>
              <li><a href="#text__lists">Lists</a></li>
              <li><a href="#text__hr">Horizontal rules</a></li>
              <li><a href="#text__tables">Tabular data</a></li>
              <li><a href="#text__code">Code</a></li>
              <li><a href="#text__inline">Inline elements</a></li>
              <li><a href="#text__comments">HTML Comments</a></li>
            </ul>
          </li>
          <li>
            <a href="#embedded">Embedded content</a>
            <ul>
              <li><a href="#embedded__images">Images</a></li>
              <li><a href="#embedded__audio">Audio</a></li>
              <li><a href="#embedded__video">Video</a></li>
              <li><a href="#embedded__canvas">Canvas</a></li>
              <li><a href="#embedded__meter">Meter</a></li>
              <li><a href="#embedded__progress">Progress</a></li>
              <li><a href="#embedded__svg">Inline SVG</a></li>
              <li><a href="#embedded__iframe">IFrames</a></li>
            </ul>
          </li>
          <li>
            <a href="#forms">Form elements</a>
            <ul>
              <li><a href="#forms__input">Input fields</a></li>
              <li><a href="#forms__select">Select menus</a></li>
              <li><a href="#forms__checkbox">Checkboxes</a></li>
              <li><a href="#forms__radio">Radio buttons</a></li>
              <li><a href="#forms__textareas">Textareas</a></li>
              <li><a href="#forms__html5">HTML5 inputs</a></li>
              <li><a href="#forms__action">Action buttons</a></li>
            </ul>
          </li>
        </ul>
      </nav>
      <main role="main">
        <section id="text">
          <header><h1>Text</h1></header>
          <article id="text__headings">
            <header>
              <h1>Headings</h1>
            </header>
            <div>
              <h1>Heading 1</h1>
              <h2>Heading 2</h2>
              <h3>Heading 3</h3>
              <h4>Heading 4</h4>
              <h5>Heading 5</h5>
              <h6>Heading 6</h6>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__paragraphs">
            <header><h1>Paragraphs</h1></header>
            <div>
              <p>A paragraph (from the Greek paragraphos, “to write beside” or “written beside”) is a self-contained unit of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of formal writing, used to organize longer prose.</p>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__blockquotes">
            <header><h1>Blockquotes</h1></header>
            <div>
              <blockquote>
                <p>A block quotation (also known as a long quotation or extract) is a quotation in a written document, that is set off from the main text as a paragraph, or block of text.</p>
                <p>It is typically distinguished visually using indentation and a different typeface or smaller size quotation. It may or may not include a citation, usually placed at the bottom.</p>
                <cite><a href="#!">Said no one, ever.</a></cite>
              </blockquote>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__lists">
            <header><h1>Lists</h1></header>
            <div>
              <h3>Definition list</h3>
              <dl>
                <dt>Definition List Title</dt>
                <dd>This is a definition list division.</dd>
              </dl>
              <h3>Ordered List</h3>
              <ol>
                <li>List Item 1</li>
                <li>List Item 2</li>
                <li>List Item 3</li>
              </ol>
              <h3>Unordered List</h3>
              <ul>
                <li>List Item 1</li>
                <li>List Item 2</li>
                <li>List Item 3</li>
              </ul>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__hr">
            <header><h1>Horizontal rules</h1></header>
            <div>
              <hr>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__tables">
            <header><h1>Tabular data</h1></header>
            <table class="table table-striped table-hover">
              <caption>Table Caption</caption>
              <thead class="thead-light">
                <tr>
                  <th>Table Heading 1</th>
                  <th>Table Heading 2</th>
                  <th>Table Heading 3</th>
                  <th>Table Heading 4</th>
                  <th>Table Heading 5</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Table Footer 1</th>
                  <th>Table Footer 2</th>
                  <th>Table Footer 3</th>
                  <th>Table Footer 4</th>
                  <th>Table Footer 5</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Table Cell 1</td>
                  <td>Table Cell 2</td>
                  <td>Table Cell 3</td>
                  <td>Table Cell 4</td>
                  <td>Table Cell 5</td>
                </tr>
                <tr>
                  <td>Table Cell 1</td>
                  <td>Table Cell 2</td>
                  <td>Table Cell 3</td>
                  <td>Table Cell 4</td>
                  <td>Table Cell 5</td>
                </tr>
                <tr>
                  <td>Table Cell 1</td>
                  <td>Table Cell 2</td>
                  <td>Table Cell 3</td>
                  <td>Table Cell 4</td>
                  <td>Table Cell 5</td>
                </tr>
                <tr>
                  <td>Table Cell 1</td>
                  <td>Table Cell 2</td>
                  <td>Table Cell 3</td>
                  <td>Table Cell 4</td>
                  <td>Table Cell 5</td>
                </tr>
              </tbody>
            </table>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__code">
            <header><h1>Code</h1></header>
            <div>
              <p><strong>Keyboard input:</strong> <kbd>Cmd</kbd></p>
              <p><strong>Inline code:</strong> <code>&lt;div&gt;code&lt;/div&gt;</code></p>
              <p><strong>Sample output:</strong> <samp>This is sample output from a computer program.</samp></p>
              <h2>Pre-formatted text</h2>
              <pre>P R E F O R M A T T E D T E X T
  ! " # $ % &amp; ' ( ) * + , - . /
  0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
  @ A B C D E F G H I J K L M N O
  P Q R S T U V W X Y Z [ \ ] ^ _
  ` a b c d e f g h i j k l m n o
  p q r s t u v w x y z { | } ~ </pre>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__inline">
            <header><h1>Inline elements</h1></header>
            <div>
              <p><a href="#!">This is a text link</a>.</p>
              <p><strong>Strong is used to indicate strong importance.</strong></p>
              <p><em>This text has added emphasis.</em></p>
              <p>The <b>b element</b> is stylistically different text from normal text, without any special importance.</p>
              <p>The <i>i element</i> is text that is offset from the normal text.</p>
              <p>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</p>
              <p><del>This text is deleted</del> and <ins>This text is inserted</ins>.</p>
              <p><s>This text has a strikethrough</s>.</p>
              <p>Superscript<sup>®</sup>.</p>
              <p>Subscript for things like H<sub>2</sub>O.</p>
              <p><small>This small text is small for for fine print, etc.</small></p>
              <p>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></p>
              <p><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></p>
              <p><cite>This is a citation.</cite></p>
              <p>The <dfn>dfn element</dfn> indicates a definition.</p>
              <p>The <mark>mark element</mark> indicates a highlight.</p>
              <p>The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</p>
              <p>The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></p>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="text__comments">
            <header><h1>HTML Comments</h1></header>
            <div>
              <p>There is comment here: <!--This comment should not be displayed--></p>
              <p>There is a comment spanning multiple tags and lines below here.</p>
              <!--<p><a href="#!">This is a text link. But it should not be displayed in a comment</a>.</p>
              <p><strong>Strong is used to indicate strong importance. But, it should not be displayed in a comment</strong></p>
              <p><em>This text has added emphasis. But, it should not be displayed in a comment</em></p>-->
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
        </section>
        <section id="embedded">
          <header><h1>Embedded content</h1></header>
          <article id="embedded__images">
            <header><h2>Images</h2></header>
            <div>
              <h3>No <code>&lt;figure&gt;</code> element</h3>
              <p><img src="http://placekitten.com/480/480" alt="Image alt text"></p>
              <h3>Wrapped in a <code>&lt;figure&gt;</code> element, no <code>&lt;figcaption&gt;</code></h3>
              <figure><img src="http://placekitten.com/420/420" alt="Image alt text"></figure>
              <h3>Wrapped in a <code>&lt;figure&gt;</code> element, with a <code>&lt;figcaption&gt;</code></h3>
              <figure>
                <img src="http://placekitten.com/420/420" alt="Image alt text">
                <figcaption>Here is a caption for this image.</figcaption>
              </figure>
            </div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__audio">
            <header><h2>Audio</h2></header>
            <div><audio controls="">audio</audio></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__video">
            <header><h2>Video</h2></header>
            <div><video controls="">video</video></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__canvas">
            <header><h2>Canvas</h2></header>
            <div><canvas>canvas</canvas></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__meter">
            <header><h2>Meter</h2></header>
            <div><meter value="2" min="0" max="10">2 out of 10</meter></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__progress">
            <header><h2>Progress</h2></header>
            <div><progress>progress</progress></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__svg">
            <header><h2>Inline SVG</h2></header>
            <div><svg width="100px" height="100px"><circle cx="100" cy="100" r="100" fill="#1fa3ec"></circle></svg></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
          <article id="embedded__iframe">
            <header><h2>IFrame</h2></header>
            <div><iframe src="index.html" height="300"></iframe></div>
            <footer><p><a href="#top">[Top]</a></p></footer>
          </article>
        </section>
        <section id="forms">
          <header><h1>Form elements</h1></header>
          <form>
            <fieldset id="forms__input">
              <legend>Input fields</legend>
              <div class="col-3">
                <p>
                  <label for="input__text">Text Input</label>
                  <input id="input__text" type="text" class="form-control" placeholder="Text Input">
                </p>
                <p>
                  <label for="input__password">Password</label>
                  <input id="input__password" type="password" placeholder="Type your Password" class="form-control">
                </p>
                <p>
                  <label for="input__webaddress">Web Address</label>
                  <input id="input__webaddress" type="url" placeholder="http://yoursite.com" class="form-control">
                </p>
                <p>
                  <label for="input__emailaddress">Email Address</label>
                  <input id="input__emailaddress" type="email" placeholder="name@email.com" class="form-control">
                </p>
                <p>
                  <label for="input__phone">Phone Number</label>
                  <input id="input__phone" type="tel" placeholder="(999) 999-9999" class="form-control">
                </p>
                <p>
                  <label for="input__search">Search</label>
                  <input id="input__search" type="search" placeholder="Enter Search Term" class="form-control">
                </p>
                <p>
                  <label for="input__text2">Number Input</label>
                  <input id="input__text2" type="number" placeholder="Enter a Number" class="form-control">
                </p>
                <p>
                  <label for="input__text3" class="error">Error</label>
                  <input id="input__text3" class="is-error form-control" type="text" placeholder="Text Input">
                </p>
                <p>
                  <label for="input__text4" class="valid">Valid</label>
                  <input id="input__text4" class="is-valid form-control" type="text" placeholder="Text Input">
                </p>
              </div>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__select">
              <legend>Select menus</legend>
              <p>
                <label for="select">Select</label>
                <select id="select" class="custom-select">
                  <optgroup label="Option Group">
                    <option>Option One</option>
                    <option>Option Two</option>
                    <option>Option Three</option>
                  </optgroup>
                </select>
              </p>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__checkbox">
              <legend>Checkboxes</legend>
              <ul class="list list--bare">
                <li><label for="checkbox1"><input id="checkbox1" name="checkbox" type="checkbox" checked="checked"> Choice A</label></li>
                <li><label for="checkbox2"><input id="checkbox2" name="checkbox" type="checkbox"> Choice B</label></li>
                <li><label for="checkbox3"><input id="checkbox3" name="checkbox" type="checkbox"> Choice C</label></li>
              </ul>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__radio">
              <legend>Radio buttons</legend>
              <ul class="list list--bare">
                <li><label for="radio1"><input id="radio1" name="radio" type="radio" class="radio" checked="checked"> Option 1</label></li>
                <li><label for="radio2"><input id="radio2" name="radio" type="radio" class="radio"> Option 2</label></li>
                <li><label for="radio3"><input id="radio3" name="radio" type="radio" class="radio"> Option 3</label></li>
              </ul>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__textareas">
              <legend>Textareas</legend>
              <p>
                <label for="textarea">Textarea</label>
                <textarea id="textarea" rows="8" cols="48" placeholder="Enter your message here" class="form-control"></textarea>
              </p>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__html5">
              <legend>HTML5 inputs</legend>
              <p>
                <label for="ic">Color input</label>
                <input type="color" id="ic" value="#000000">
              </p>
              <p>
                <label for="in">Number input</label>
                <input type="number" id="in" min="0" max="10" value="5" class="form-control">
              </p>
              <p>
                <label for="ir">Range input</label>
                <input type="range" id="ir" value="10" class="custom-range">
              </p>
              <p>
                <label for="idd">Date input</label>
                <input type="date" id="idd" value="1970-01-01" class="form-control">
              </p>
              <p>
                <label for="idm">Month input</label>
                <input type="month" id="idm" value="1970-01" class="form-control">
              </p>
              <p>
                <label for="idw">Week input</label>
                <input type="week" id="idw" value="1970-W01" class="form-control">
              </p>
              <p>
                <label for="idt">Datetime input</label>
                <input type="datetime" id="idt" value="1970-01-01T00:00:00Z" class="form-control">
              </p>
              <p>
                <label for="idtl">Datetime-local input</label>
                <input type="datetime-local" id="idtl" value="1970-01-01T00:00" class="form-control">
              </p>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
            <fieldset id="forms__action">
              <legend>Action buttons</legend>
              <p>
                <input type="submit" value="<input type=submit>" class="btn btn-outline-primary">
                <input type="button" value="<input type=button>" class="btn btn-outline-primary">
                <input type="reset" value="<input type=reset>" class="btn btn-outline-danger">
                <input type="submit" value="<input disabled>" disabled class="btn btn-outline-secondary">
              </p>
              <p>
                <button type="submit" class="btn btn-outline-primary">&lt;button type=submit&gt;</button>
                <button type="button" class="btn btn-outline-primary">&lt;button type=button&gt;</button>
                <button type="reset" class="btn btn-outline-danger">&lt;button type=reset&gt;</button>
                <button type="button" disabled class="btn btn-outline-secondary">&lt;button disabled&gt;</button>
              </p>
            </fieldset>
            <p><a href="#top">[Top]</a></p>
          </form>
        </section>
      </main>

<!-- kończy sekcję -->
@endsection