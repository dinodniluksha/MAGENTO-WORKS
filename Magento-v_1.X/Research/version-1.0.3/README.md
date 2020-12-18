# OGMO plugin within Product Option (v1.0.3)

Inside this implementation, mainly consider how to call the viewer in product option-wise and submitting “Add to Cart” form with selected option value through the OGMO plugin as below. <br/>
**Note : Color option was considered for testing purpose** 


If a viewer link is available, **Line 83-131** try to discover data related to color option.

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/getOpt.JPG)

<br/>

Below code snip from **Line 432-481** which can get user selected color option value through the product page or default (first value) color option value before clicking “Live View” button. As a result of clicking “Live View” button, color changing mechanism must be activated inside **callingColor(color)** function within parsing a color parameter. ex: **callingColor(Red)**

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/getOptValue.JPG)

<br/>

**callingColor(color)** function is in **Line 420-424** implemented as below code snit. Note: Mechanism must be created inside **callingColor(color)** function to assign color (default/ user selected value through the product page/ user selected value through the Iframe) for a 3D model.

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/colorChange.JPG)

<br/>

After clicking the “Live View” button the relevant 3D model of product view on iframe within color option buttons. Then the user can select desire color option to change the color of 3D model also at the same time that color value assigned to color option field in “Add to Cart” form by using below function. **Line 569-573** **viewerFunction(color)** 

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/viewerFun.JPG)


 **viewerFunction(color)** is triggered by clicking option buttons like below image.
 
 ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/grouped.png)
 
 <br/>
 
 **assigningValue(color)** function is in **Line 511-567** implemented as below code snit. It’s used to assign user selected value to “Add to Cart” form through the iframe before submitting Add to Cart form. 
 
File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/asignValue.JPG)

<br/>

Finally, user can submit the Add to Cart form by clicking “Add to Cart” button on iframe (through the OGMO plugin). It triggered **addToCartOnIframe()** function in **Line 499-508**. Note: Further we can implement additional mechanism inside addToCartOnIframe() function to track “Add to Cart” button click count through the OGMO plugin. 

File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/Capture.JPG)

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/UntitledAddToCart.png)

End result (Option buttons + “Add to Cart” button) can be seen after clicking “Live View” button as below the image.

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.3/final.JPG)
 
