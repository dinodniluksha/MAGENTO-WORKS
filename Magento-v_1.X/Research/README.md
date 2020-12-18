# Further Activities after coding Magento 1 extension

This document mainly focuses major processes we can do after completing extension coding. It can be represented under main 3 areas,

*  [Packaging](#packaging)
*  [Direct packaged uploading](#direct-packaged-uploading)
*  [Magento Marketplace uploading](#magento-marketplace-uploading)

## Packaging

After creating and testing any kind of Magento1 extension, packaging is required process we should done before installing/uninstalling plugin locally -(without using extension key from Magento Marketplace) or uploading to Magento Marketplace. 

**Note : Download available any version of extension (version-1.0.1 / version-1.0.2 / version-1.0.3) folder which can directly copy and paste inside Magento1 root directory. Then go to start Magento1 extension Packaging.**

Before packaging make sure “connect” folder as Magento1_root/var/connect. <br/>
Create “connect” folder if it’s not available in “var” folder in Magento 1 root directory.

Let’s start Magento1 Extension Packaging 

1.  Go to Dashboard of your Magento1 website and open **Create Extension Package** page. <br/>
(System > Magento Connect > Package Extensions) 

2.  Open **Package Info** tab and fill all required fields as below. 
    
    Name : Unique name (ex : LiveRoom_Ogmo ) <br/> 
    Channel : community <br/>
    Supported releases : 1.5.0.0 & later (depend on your version of Magento site) <br/>
    Summary : Any applicable summary <br/>
    Description : Any applicable description <br/>
    License : OSL v3.0 <br/>
    License URI : http://opensource.org/licenses/osl-3.0.php 

3.  Open **Release Info** tab and fill all required fields as below.

    Release Version : version number mentioned under version tag in config.xml file (1.0.3) <br/>
    Release Stability : select any stability (select only stable :-completing all developing or Extension for Marketplace) <br/>
    Notes : Any applicable notes 

4.  Open **Authors** tab and fill all required fields as below. 

    Name : Full name of author (full name of Magento admin) <br/>
    User : user name of Magento admin <br/>
    Email : valid email address 

5. Open **Dependencies** tab and fill all required fields as below. 

    Minimum : supported minimum version of PHP <br/>
    Maximum : supported maximum version of PHP 

6. Open **Contents** tab and adding all path records one by one by clicking “Add Contents Path” button.

    Target : Target can be a one of below categories.
    

*  Magento Local module file - ./app/code/local 
*  Magento Community module file - ./app/code/community 
*  Magento Core team module file - ./app/code/core 
*  Magento User Interface (layouts, templates) - ./app/design 
*  Magento Global Configuration - ./app/etc 
*  Magento PHP Library file - ./lib 
*  Magento Locale language file - ./app/locale 
*  Magento Media library - ./media 
*  Magento Theme Skin (Images, CSS, JS) - ./skin 
*  Magento Other web accessible file - ./ 
*  Magento PHPUnit test - ./tests 
*  Magento other - ./ 

    **Where “./” represents the Magento root directory.**
    
    Path : give path(after target) focused to end file or directory 

    Type : select type (File / Recursive Dir) for end of Path described above
    
    <br/>
    
7. Finally you can complete packaging process by clicking “Save Data and Create Package” button. Now package is created and saved under Magento_root/var/connect folder. <br/>

<br/>
Reference link to get further details for packaging process of Magento 1

<br/>
<br/>
https://docs.magento.com/marketplace/user_guide/sellers/packaging-v1x-extensions.html <br/>
https://www.dckap.com/blog/steps-to-create-magento-extension-package-file/ <br/><br/><br/><br/>

Let’s fill Contents considering like below extension.

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.1/final_struct.JPG)

    Target :  Magento Community module file 
    Path : Liveroom 
    Type : Recursive Dir 
     
    Target :  Magento User Interface (layouts, templates) 
    Path : adminhtml/default/default/layout/picker.xml  
    Type : File 
     
    Target :  Magento User Interface (layouts, templates) 
    Path : frontend/base/default/layout/liveroom_ogmo.xml 
    Type : File 
     
    Target :  Magento User Interface (layouts, templates) 
    Path : frontend/base/default/template/liveroom 
    Type : Recursive Dir 
     
    Target :  Magento Global Configuration 
    Path : modules/Liveroom_Ogmo.xml 
    Type : File 
     
    Target :  Magento Theme Skin (Images, CSS, JS) 
    Path : frontend/base/default/css/liveroom_ogmo.css 
    Type : File 
    
<br/>
At the end of the packaging, 3 files are generated like below image and further you can use only packaged file (LiveRoom_Ogmo-1.0.3.tgz) for doing below 2 activities.

<br/>
<br/>

*  [Direct packaged uploading](#direct-packaged-uploading)
*  [Magento Marketplace uploading](#magento-marketplace-uploading)

![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/further/packaged.PNG)

<br/>

## Direct packaged uploading 

Direct uploading packaged extension (Vendor_Module-version.tgz) file through the Magento Connect Manager 

1. Go to Dashboard of your Magento1 website and Login to Magento Connect Manager page. <br/>
    (System > Magento Connect > Magento Connect Manager) 

    ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/further/connect_manager.PNG)
<br/>

2. Click “Choose File” button in **Direct package file upload** field and select your desire package file 

    ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.1/upoading.JPG)
<br/>

3. Then click “Upload” button to continue the progress so you can see below window image. 
    
    ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/v1.0.1/progress.JPG)

4. Finally click the “Refresh” button to complete the extension uploading. 

<br/>

## Magento Marketplace uploading

Uploading packaged extension (Vendor_Module-version.tgz) into Magento Marketplace. There are two possible way to do this job 

**Note : Please check packaged extension code must be in clean and without any unnecessary code segment before uploading to Magento 1 Marketplace.**

*  Uploading the fresh extension package as a first release 

    Reference link to get further details for submitting extension into Magento 1 Marketplace <br/>
    
    https://docs.magento.com/marketplace/user_guide/sellers/submit-for-review.html <br/>
    https://magecomp.com/blog/guide-to-submit-magento-extension-to-magento-marketplace/ 
 
 <br/><br/>
 
*  Uploading another version of packaged extension (upgrading)

1. First go to below link to access Magento extension page <br/>
    https://developer.magento.com/extensions/

2. Enter login details and select **Ogmo Integration** (for Magento1) as platform for submitting packaged extension like below image.

    **Login details** for existing account (LiveRoom PVT Ltd) <br/>
    Email : info@liveroom.xyz <br/>
    Password : liver00m@1

    ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/further/extension.PNG)
    
    <br/>
    
3. After click “Submit a New Version” button in **Submit a New Version** field as below image.

    ![alt test](https://github.com/dinodniluksha/MAGENTO-WORKS/blob/master/Magento-v_1.X/README_IMAGES/Magento_Plugins/Magento1/further/submittig.PNG)
    
    <br/>
    
4. Next continue further 2 major processes (Technique Review and Marketing Review) by giving relevant information. 

    **Note : Then extension is rested in Magento marketplace if passed the both of Technique Review and Marketing Review.**
