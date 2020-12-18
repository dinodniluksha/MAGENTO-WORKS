# OGMO plugin within Advanced Button Adder Mechanism (v1.0.2)

This implementation makes high advanced mechanism for adding “Live View” button near to “Add to Cart” button in product page. In most of themes “Add to Cart” button placed as “one DIV” architecture (Figure 1) but sometimes, “Add to Cart” button placed as “nested DIV” architecture (Figure 2). Also, the difference between “one DIV” and “nested DIV” patterns can be easily understood by observing below both figures. 

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/onee_div.PNG)<br/>
Figure 1 (“one DIV” patterns) 

<br/><br/>

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/nested_div.PNG)<br/>
Figure 2 (“nested DIV” patterns) 

<br/><br/>

So, [first button adder mechanism](version-1.0.1) in OGMO plugin gives below simple output as a result but that output is different than real expected output. Because “Add to Cart” and “Live View” buttons are placed into same DIV and it’s caused to assign unfitted style to additional button (Live View).  

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/week_adder.PNG)

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/wrong_output.PNG)

<br/>
Therefore, higher advance button adder mechanism is introduced to solve previous mentioned week point. Also, this mechanism can recognize whether “Add to Cart” button is in nested DIV architecture or not figure. After this recognizing step, mechanism is responsible to give signal for adding “Live View” button by following same manner of “Add to Cart” button in various Magento1 themes. It can be represented as below.

<br/>
<br/>
![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/actual_output.PNG)

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/expected_output.PNG)

<br/>
As well as higher advance button adder mechanism is used a small trick to recognize real DIV pattern of “Add to Cart” button so “one DIV” pattern have Add to Cart button and Quantity input field in same DIV as child elements. But “Add to Cart” button is in separate child DIV as well as without Quantity input field because in this “nested DIV” architecture, Quantity input field rest in parent or sibling DIV of DIV of “Add to Cart” button. 


So, **Line 194-208** implemented for catching “one DIV” architecture by filtering Quantity input field (excepting DIV, SPAN, SCRIPT, STYLE)

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/One_DIV.PNG)

<br/>
<br/>

Next step, **Line 209-227** is analyzing DIV and SPAN (except “ogmo-gltf-viewer-modal” DIV) to verify more “one DIV” pattern are visible or not by triggering **decorder( btn_childs[j] )** function.

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/trigger_decoder.PNG)

<br/>
<br/>

**decorder( obj )** function is implemented **Line 156-191**. This function recursively spread and analyze each DIV/SPAN element, until catching Quantity input field or finishing spread process of DIV/SPAN. After completing this function, it finalizes “one DIV” or “nested DIV” architecture by assigning “0” or “1” to [create] variable. ( “one DIV” : if create = 0 , “nested DIV” : if create = 1 ) 
<br/>

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/decorder.PNG)

<br/>
<br/>

Finally, “Live View” button insertion process starts according to “one DIV” or “nested DIV” architecture. Therefore in “one DIV” pattern (create = 0), “Live View” button is inserted near to “Add to Cart” button as only a simple button. But in “nested DIV” pattern (create = 1) “Live View” button is embedded into new DIV and this DIV is inserted near to DIV of “Add to Cart”. This final action is completed by using below code snip **Line 264-284** 

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.2/insertion.PNG)
