# Basic First OGMO plugin (v1.0.1)

This is a very basic Magento1 OGMO plugin for achieving major requirements of OGMO project. Those major requirements and how they could be succeeded describe as below. 

![alt test](README_IMAGES/Magento_Plugins/Magento1/v1.0.1/main_structure.JPG)

### Requirements and how they succeeded

1.  **Adding a theme compatible new button (Live View) near to “Add to Cart” button inside product page.**

    Also this button can be automatically made compatibility for given theme of Magento 1. So new button (Live View) can absorb all CSS styles of Add to Cart button. As well as further user able to configure few style attributes (font color, button margins, border) for Live View button through the Magento Admin panel. 

    File : app/code/community/Liveroom/Ogmo/etc/system.xml<br/> 
    Purpose : 
                  
*                 a. Getting user configuration value for “Live View” button through the Admin panel  
 
    File : app/design/frontend/base/default/template/liveroom/ogmo/button_add_inline.phtml<br/>
    Purpose :
*                 a. Getting user saved configuration value into template file. [ Line 45-49 ]
*                 b. Assigning retrieved configuration value to “Live View” button. [ Line 54-76 ]
*                 c. Giving iframe to display content from viewer. [ Line 80-90 ]
*                 d. Adding “Live View” button near to “Add to Cart” button within protected style compatibility. [ Line 96-175 ]
*                 e. Handling “Live View” button onclick function and another onclick functions for displaying content from viewer. [ Line 179-202 ]


                 
2. **Avoiding week issues after OGMO plugin uninstalling and solving practically issues can be generated OGMO overall project (product linking to OGMO account).**

    This plugin has 3rd party API call mechanism to retrieve relevant viewer link without store in Magento backend database. It helped to make smooth uninstalling process of OGMO plugin (no any site-down issues even after uninstalling OGMO plugin). Also, this plugin gives live response to any changes make in linked OGMO account (disabling, deactivation, upgrading). So, this plugin is responsible to read any response come from API request generate in each product. Actually this 3rd party API call is triggered inside backend of Magento website when rendering each product page. Therefore “Live View” button is added or not can be determined before loading product page into frontend. 
    
    File : app/code/community/Liveroom/Ogmo/Helper/ Data.php  
    Purpose : Implementing getLink() function to  

*                  a. Retrieve viewer link which is linked with product. [ Line 07-58 ] 
*                  b. Add log updating feature to handle exception during API calls. [ Line 79-85 ] 
