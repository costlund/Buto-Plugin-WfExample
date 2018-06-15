<?php
/**
<p>Plugin example.</p>
<p>HTML example code.</p>
#code-html#
&lt;i class="icon-user icons"&gt;&lt;/i&gt;
#code#
<p>Javascript example code.</p>
#code-javascript#
document.getElementById('my_id').innerHTML='Hello world!';
#code#
<p>PHP example code.</p>
#code-php#
echo('Hello world!');
#code#
<p>YML example.</p>
#code-yml#
settings:
  dump: true
#code#
<p>YML example from file <i>(Could be any file)</i>.</p>
#code-yml#
#load:[app_dir]/plugin/[plugin]/default/widget.hellodata.yml:load#
#code#
<p><i>View sourse code for this file to se how this is set up.</i></p>
 */
class PluginWfExample{
  function __construct($buto = false) {
    if($buto){
      // Is true if class is loaded from Buto system. This can prevent wf/editor to run code when reflect this class.
    }
  }
  /**
   * Widget to generate a span tag with Hello World!
   */
  public static function widget_helloworld(){
    $element = wfDocument::createHtmlElement('span', 'Hello World!');
    wfDocument::renderElement(array($element));
  }
  /**
   <p>Widget to generate a span tag with custom message!</p>
  #code-yml#
   example: true
  #code#
   */
  public static function widget_hellodata($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $element = wfDocument::createHtmlElement('span', $data->get('data/message'));
    wfDocument::renderElement(array($element));
  }
  /**
   * Example of using method in document innerHTML param.
   * innerHTML: 'method:wf/example:test:{"id"$ 1234}'
   * @param array $data
   * @return type
   */
  public function method_test($data){
    wfPlugin::includeonce('wf/array');
    $data = new PluginWfArray($data);
    $element = array();
    $element[] = wfDocument::createHtmlElement('div', array(
        wfDocument::createHtmlElement('h1', 'PluginWfExample ()'), 
        wfDocument::createHtmlElement('strong', 'ID:'), 
        wfDocument::createHtmlElement('span', $data->get('id'))
        ));
    return $element;
  }
}
