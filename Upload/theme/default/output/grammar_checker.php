<?php
defined('APP_NAME') or die(header('HTTP/1.1 403 Forbidden'));

/*
 * @author Balaji
 * @name A to Z SEO Tools - PHP Script
 * @copyright 2020 ProThemes.Biz
 *
 */
?>
<link href="<?php themeLink('css/grammar.css'); ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php themeLink('css/jquery.fileupload.css'); ?>" />
<link href="<?php themeLink('vendors/dropkick/dropkick.css'); ?>" rel="stylesheet">
<link href="<?php themeLink('vendors/vex/vex.css'); ?>" rel="stylesheet">
<link href="<?php themeLink('vendors/vex/vex-theme-os.css'); ?>" rel="stylesheet">
<script>
    var languageToText = [];
    languageToText['ast'] = 'Apega testu equí. o revisa toes les pallabres de esti testu pa ver dalgún de los problemis que LanguageTool ye pa deteutar. ¿Afáyeste con los correutores gramaticales? Has date cuenta de que entá nun son perfeutos.';
    languageToText['en'] = 'Paste your own text here and click the \'Check Text\' button. Click the colored phrases for details on potential errors. or use this text too see an few of of the problems that LanguageTool can detecd. What do you thinks of grammar checkers? Please not that they are not perfect. Style issues get a blue marker: It\'s 5 P.M. in the afternoon. LanguageTool was released on Thursday, 21 April 2018.';
    languageToText['br'] = 'Lakait amañ ho testenn vrezhonek da vezañ gwiriet. Pe implijit an frazenn-mañ gant meur a fazioù yezhadurel.';
    languageToText['ca'] = 'Introduïu açí el vostre text. o feu servir aquest texts com a a exemple per a alguns errades que LanguageTool hi pot detectat.';
    languageToText['zh'] = '将文本粘贴在此，或者检测以下文本：我和她去看了二部电影。';
    languageToText['eo'] = 'Algluu vian kontrolendan tekston ĉi tie... Aŭ nur kontrolu ĉi tiun ekzemplon. Ĉu vi vi rimarkis, ke estas gramatikaj eraro en tiu frazo? Rimarku, ke Lingvoilo ankaux atentigas pri literumaj erraroj kiel ĉi-tiu.';
    languageToText['fa'] = 'لطفا متن خود را اینجا قرار دهید . یا بررسی کنید که این متن را‌ برای دیدن بعضی بعضی از اشکال هایی که ابزار زبان توانسته تشخیس هدد. درباره ی نرم افزارهای بررسی کننده های گرامر چه فکر می کنید؟ لطفا در نظر داشته باشید که آن‌ها بی نقص نمی باشند.‎';
    languageToText['fr'] = 'Copiez votre texte ici ou vérifiez cet exemple contenant plusieurs erreur que LanguageTool doit doit pouvoir detecter.';
    languageToText['de'] = 'Fügen Sie hier Ihren Text ein. Klicken Sie nach der Prüfung auf die farbig unterlegten Textstellen. oder nutzen Sie diesen Text als Beispiel für ein Paar Fehler , die LanguageTool erkennen kann: Ihm wurde Angst und bange. Mögliche stilistische Probleme werden blau hervorgehoben: Das ist besser wie vor drei Jahren. Eine Rechtschreibprüfun findet findet übrigens auch statt. Donnerstag, den 27.06.2018 wurde LanguageTool veröffentlicht.';
    languageToText['de-DE-x-simple-language'] = 'Fügen Sie hier Ihren Text ein oder benutzen Sie diesen Text als Beispiel. Dieser Text wurde nur zum Testen geschrieben. Die Donaudampfschifffahrt darf da nicht fehlen. Und die Nutzung des Genitivs auch nicht.';
    languageToText['it'] = 'Inserite qui il vostro testo... oppure controlate direttamente questo ed avrete un assaggio di quali errori possono essere identificati con LanguageTool.';
    languageToText['pl'] = 'Wpisz tekst lub użyj istniejącego przykładu. To jest przykładowy tekst który pokazuje, jak jak działa LanguageTool. LanguageTool ma jusz korektor psowni, który wyrurznia bledy na czewrono.';
    languageToText['pt'] = 'Cole aqui seu texto...ou verifique esta texto, afim de revelar alguns dos dos problemas que o LanguageTool consegue detectar. Isto tal vez permita corrigir os seus erro. Nós prometo ajudá-lo. para testar a grafia e as regrs do antigo) Acordo Ortográfico,, verifique o mesmo texto mesmo texto em Português de Angola ou Português do Moçambique e faça a analise dos resultados.. Nossa equipe anuncias a versão 4.1, que será lançada sexta-feira, 27 de março de 2018.';
    languageToText['ru'] = 'Вставьте ваш текст сюда .. или проверьте этот текстт. Релиз LanguageTool 4.0 состоялся в четверг 29 декабря 2018 года.';
    languageToText['be'] = 'Паспрабуйце напісаць нейкі тэкст з памылкамі, а LanguageTool паспрабуе паказаць нейкия найбольш распаусюджаныя памылки.';
    languageToText['da'] = 'Indsæt din egen tekst her , eller brug denne tekst for at se nogle af de fejl LanguageTool fanger. vær opmærksom på at den langtfra er er perfect, men skal være en hjælp til at få standartfejl frem i lyset.';
    languageToText['el'] = 'Επικολλήστε το κείμενο σας εδώ και κάντε κλικ στο κουμπί ελέγχου. Κάντε κλικ στις χρωματιστές φράσεις για λεπτομέρειες σχετικά με πιθανά σφάλματα. Για παράδειγμα σε αυτή τη πρόταση υπάρχουν εσκεμμένα λάθη για να να δείτε πώς λειτουργει το LanguageTool..';
    languageToText['es'] = 'Escriba un texto aquí. LanguageTool le ayudará a afrentar algunas dificultades propias de la escritura. Se a hecho un esfuerzo para detectar errores tipográficos, ortograficos y incluso gramaticales. También algunos errores de estilo, a grosso modo.';
    languageToText['gl'] = 'Esta vai a ser unha mostra de de exemplo para amosar  o funcionamento de LanguageTool.';
    languageToText['ja'] = 'これわ文章を入力して\'Check Text\'をクリックすると、誤記を探すことができる。着色した文字をクリックすると、間違いの詳細の表示する。';
    languageToText['km'] = 'ឃ្លា​នេះ​បង្ហាញ​ពី​ពី​កំហុស​វេយ្យាករណ៍ ដើម្បី​បញ្ជាក់​ពី​ប្រសិទ្ធភាព​របស់​កម្មវិធី LanguageTool សំរាប់​ភាសាខ្មែរ។';
    languageToText['nl'] = 'Languagetool doet van zelfsprekend veel meer dan spellingcontrole. Het ziet het ook fouten die minder inde gaten lopen, die je zelf geen eens ziet. De meldingen komen uit regels die door vrijwilligers gemaakt zijn aan de hand van suggesties van gebruikers en tips van taaldeskundigen. Ondanks het feit dat er veel aandacht aan de regels wordt besteed, blijven suggesties altijd welkom. Probeer het rustig zelf eens uit hier, of download een van de plugins op deze pagina.';
    languageToText['sk'] = 'Toto je ukážkový vstup, na predvedenie funkčnosti LanguageTool. Pamätajte si si, že neobsahuje "kontrolu" preklepo.';
    languageToText['sl'] = 'Tukaj vnesite svoje besedilo... Pa poglejmo primer besedila s nekaj napakami ki jih lahko razpozna orodje LanguageTool; ko opazite napake, jih lahko enostavno popiravite. ( Obenem se izvrši tudi preverjanje črkovanja črkovanja.';
    languageToText['ta'] = 'இந்த பெட்டியில் உங்கள் உரையை ஒட்டி சரிவர சோதிக்கிறதா என பாருங்கள். \'லேங்குவேஜ் டூல்\' சில இலக்கணப் பிழைகளைச் சரியாக கண்டுபிடிக்கும். பல பிழைகளைப் பிடிக்க தடுமாறலாம்.';
    languageToText['tl'] = 'Ang LanguageTool ay maganda gamit sa araw-araw. Ang talatang ito ay nagpapakita ng ng kakayahan ng LanguageTool at hinahalimbawa kung paano ito gamitin. Litaw rin sa talatang ito na may mga bagaybagay na hindii pa kayang itama nng LanguageTool.';
    languageToText['uk'] = 'УВАГА! Внизу наведено приклад тексту з помилками, які допоможе виправити LanguageTool. Будь-ласка, вставте тутт ваш текст, або перевірте цей текст на предмет помилок. Знайти всі помилки для LanguageTool є не по силах з багатьох причин але дещо він вам все таки підкаже. Порівняно з засобами перевірки орфографії LanguageTool також змайде граматичні та стильові проблеми. LanguageTool — ваш самий кращий помічник.';
    var checkDefaultLangWithCountry = "en-US";
</script>

<div class="container main-container">
    <div class="row">
        <?php
        if($themeOptions['general']['sidebar'] == 'left')
            require_once(THEME_DIR."sidebar.php");
        ?>
        <div class="col-md-8 main-index">

            <div class="xd_top_box">
                <?php echo $ads_720x90; ?>
            </div>

            <h2 id="title"><?php echo $data['tool_name']; ?></h2>

            <br />

            <div>
                <p><?php trans('Enter your text', $lang['AD393']); ?>:</p>
                <div class="text-center">(or)</div>
                <p><?php trans('Upload a document: (Supported Format: .doc, .docx, .txt)', $lang['AD394']); ?></p>
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span><?php trans('Select file', $lang['AD395']); ?></span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple >
                    </span>
                <br />
                <br />

                <!-- The global progress bar -->
                <div id="progress" class="progress">
                    <div class="progress-bar progress-bar-success progress-bar-striped"></div>
                </div>
            </div>

            <div class="inner">
                <div id="editor">
                    <div class="inner">
                        <noscript class="warning">Please turn on Javascript to use this website</noscript>
                        <form id="checkform" class="" name="checkform" action="#" method="post">
                            <div id="handle">
                                <div id="feedbackMessage"></div>
                            </div>
                            <div class="window">
                                <div class="fullscreen-toggle">
                                    <a href="#" title="toggle fullscreen mode"
                                       onClick="fullscreen_toggle();return false;"></a>
                                </div>
                                <p id="checktextpara" style="margin: 0">
                                <textarea id="checktext" name="text" style="width: 100%"
                                          rows="10">Paste your own text here and click the 'Check Text' button. Click the colored phrases for details on potential errors. or use this text too see an few of of the problems that LanguageTool can detecd. What do you thinks of grammar checkers? Please not that they are not perfect. Style issues get a blue marker: It's 5 P.M. in the afternoon. LanguageTool was released on Thursday, 21 April 2018.</textarea>
                                </p>
                                <div id="editor_controls">
                                    <div id="feedbackErrorMessage"></div>
                                    <div id="sentenceContributionMessage"></div>

                                    <div class="editor_controls_items">
                                        <div class="dropdown editor_controls_group">
                                            <select class="dropkick editor_controls_group_item" style="width: 100%" name="lang"
                                                    id="lang">
                                                <option value="auto" >auto-detect</option>
                                                <option value="nl" >Dutch</option>
                                                <option value="en-US"  selected='selected'>English</option>
                                                <option value="fr" >French</option>
                                                <option value="de-DE" >German</option>
                                                <option value="it" >Italian</option>
                                                <option value="pl" >Polish</option>
                                                <option value="pt" >Portuguese</option>
                                                <option value="ru" >Russian</option>
                                                <option value="es" >Spanish</option>
                                                <option value="uk" >Ukrainian</option>
                                                <option value="ast" >Asturian</option>
                                                <option value="br" >Breton</option>
                                                <option value="zh" >Chinese</option>
                                                <option value="eo" >Esperanto</option>
                                                <option value="gl" >Galician</option>
                                                <option value="el" >Greek</option>
                                                <option value="ja" >Japanese</option>
                                                <option value="ca" >Catalan</option>
                                                <option value="km" >Khmer</option>
                                                <option value="fa" >Persian</option>
                                                <option value="ro" >Romanian</option>
                                                <option value="sv" >Swedish</option>
                                                <option value="sk" >Slovak</option>
                                                <option value="sl" >Slovenian</option>
                                                <option value="ta" >Tamil</option>
                                                <option value="tl" >Tagalog</option>
                                                <option value="be" >Belarusian</option>
                                            </select>

                                            <div id="subLangDropDown" class="editor_controls_group_item"
                                                 style="display: flex;">
                                                <!-- NOTE: keep this in sync with header.php and the if() above: -->
                                                <select class="dropkick" name="subLang" id="subLang"
                                                        style="width: 100%">
                                                    <option>US</option>
                                                    <option>GB</option>
                                                    <option>AU</option>
                                                    <option>CA</option>
                                                    <option>NZ</option>
                                                    <option>ZA</option>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="submit editor_controls_group">
                                            <button class="btn btn-warning" type="submit"
                                                    onClick="tinyMCE.activeEditor.setContent('');tinyMCE.get('checktext').focus();return false;"
                                                    title="Delete text">
                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                            </button>

                                            <button class="btn btn-success" type="submit" name="_action_checkText"
                                                    onClick="doit(true);return false;"
                                                    title="Check Text - or use Ctrl+Return">
                                                Check Text                                    </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <br />

            <div class="xd_top_box">
                <?php echo $ads_720x90; ?>
            </div>

            <h2 id="sec1" class="about_tool"><?php echo $lang['11'].' '.$data['tool_name']; ?></h2>
            <p>
                <?php echo $data['about_tool']; ?>
            </p> <br />
        </div>

        <?php
        if($themeOptions['general']['sidebar'] == 'right')
            require_once(THEME_DIR."sidebar.php");
        ?>
    </div>
</div> <br />

<script src="<?php themeLink('vendors/vex/vex.combined.min.js'); ?>"></script>
<script src="<?php themeLink('vendors/tiny_mce/tiny_mce.js'); ?>"></script>
<script src="<?php themeLink('vendors/tiny_mce/plugins/atd-tinymce/editor_plugin2.js?v2'); ?>"></script>
<script src="<?php themeLink('vendors/dropkick/jquery.dropkick.js'); ?>"></script>
<script src='<?php createLink('core/library/grammar.js?v2',false,true); ?>'></script>
<script src="<?php themeLink('js/vendor/jquery.ui.widget.js'); ?>"></script>
<script src="<?php themeLink('js/jquery.iframe-transport.js'); ?>"></script>
<script src="<?php themeLink('js/jquery.fileupload.js'); ?>"></script>

<script>
    /*jslint unparam: true */
    /*global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = baseUrl+'core/upload/';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    // Completed
                    var file_name = file.name;
                    jQuery.post(baseUrl+'core/upload/process.php',{fileName:file_name},function(data){
                        $("#checktext_ifr").contents().find("body").html('<p>'+data+'</p>');
                    });
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>