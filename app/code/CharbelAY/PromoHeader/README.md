### PromoHeader

#### This module demonstrates basics of how to work with magento knockout js

All the action takes place in the view directory. 
This kind of makes since since ko is responsible for UI.

Under view we can have 3 directories. frontend, backend and default
in our case we are changing frontend functionality. So we will be creating our changes in frontend folder

layout folder will contain the XML files that affect the page layout
And where we will define our components. It's the prefered way of doing this
Since later other modules can override/change those settings by overriding the XML file

```
<block name="promo.header.ui.component" template="CharbelAY_PromoHeader::promo_header.phtml" before="-">
    <arguments>
        <argument name="jsLayout" xsi:type="array">
            <item name="components" xsi:type="array">
                <item name="promo-header-container" xsi:type="array">
                    <item name="component" xsi:type="string">
                        CharbelAY_PromoHeader/js/promo_header
                    </item>
                    <item name="config" xsi:type="array">
                        <item name="message" xsi:type="string">Override from xml</item>
                    </item>
                </item>
            </item>
        </argument>
    </arguments>
</block>
```

First we declate the phtml file that will be used in this block
It's declared under the templates folder.
```VendorName_ModuleName::AnySubfolderOfTemplates/template_name.phtml```

Then we pass arguments node inside the block node
We start with ```jsLayout``` This will be later used in the template to get the components
By calling ```$block->getJsLayout()```

Inside the jsLayout node we pass components array that will contain the UI Components we will use.
One of them for example is ```promo-header-container```
Inside of it we can define a config node to override/set defaults that is used in the js UI Component
Check ```web/js/promo_header.js```.
We can also define the js file name
In our case ```CharbelAY_PromoHeader/js/promo_header```

Now inside the phtml template we can initialize the component and attach it to an html tag
```
<div id="promo-header-container" data-bind="scope: 'promo-header-container'">
    <!-- ko template: getTemplate() --> <!-- /ko -->
</div>

<script type="text/x-magento-init">
    {
        "#promo-header-container": {
            "Magento_Ui/js/core/app": <?= $block->getJsLayout(); ?>
        }
    }
</script>
```
getJsLayout will transform the XML into a json file and pass it to Magentos
```Magento_Ui/js/core/app``` who will initialize it
in the div tag we use a ko directive data-bind with scope that has the name of the component defined in the xml file
this way we can chose which component gets attached to which html bloc
Then inside the root html tag we call getTemplate() which will render
```web/template/promo_header.html```. this is defines in the promo_header.js inside defaults

You see. Sometimes we use :: other times we use / to define files
Usually if it's php we use ::  if js we use / 
```CharbelAY_PromoHeader/js/promo_header``` vs ```VendorName_ModuleName::AnySubfolderOfTemplates/template_name.phtml```
