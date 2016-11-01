{extends file="smarty/application/templates/base.tpl"}
{block name=contenuto}
<script>
   function disabledRequired()
   {
     {foreach from=$required  item=entry}
     {if $entry != 'id'}
     $('[name="{$entry}"]').prop('required', false);
     {/if}
     {/foreach}
   }

</script>
<div class="container">
   <div class="row">
      {if isset($insertError)}
      <div class="card-panel teal lighten-2">
         <strong>
            <center>Attenzione!
         </strong>
         {$insertError}</center>
      </div>
      {/if}
   </div>
   <div class="row">
      <form class="col s12 m12" name="form1" class="form-horizontal" action="submit.php" method="POST">
         <div class="row">
            <div class="input-field col s12 m12">
               <input type="text" class="validate" name="id" placeholder="Id App" required value="{$appId}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="">Id App</a>
               </label>
            </div>
            <div class="input-field col s12">
               <center>
                  <button type="submit" onclick="disabledRequired();" class="waves-effect waves-light btn" name="fetchFromStore" value="1">
                  Fetch From Store</button>
               </center>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="name" placeholder="Title App" required value="{$appName}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="insert title app">Title</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="oneLiner" placeholder="Description App" value="{$appDescription}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="description">Description</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="seller" placeholder="Name of the seller" value="{$appSeller}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="name of the seller">Seller</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="sourceCodeUrl" placeholder="CodeUrl Recognition" value="{$appSourceCodeUrl}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="code url recognition">Source Code Url</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterName" placeholder="Name Developer" value="{$appSourceName}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="name developer">Source Name</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterWebSite" placeholder="WebSite Developer" value="{$appsubmitterWebSite}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="website developer">Web Site</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="submitterEmail" placeholder="Email Developer" value="{$appsubmitterEmail}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="email developer">Email</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="isSubmitterDeveloper" placeholder="Developer" value="{$appisSubmitterDeveloper}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="developer">Developer</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="technicalNotes" placeholder="Technical Notes" value="{$apptechnicalNotes}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="technical notes">Technical Notes</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="iconUrl" placeholder="Icon image" required value="{$appImage}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="image">iconUrl</a>
               </label>
            </div>
         </div>
         <div class="row">
            {foreach from=$appScreenshot item=screenshot}
            <div class="input-field col s12">
               <input type="text" class="validate" name="screenshots[]" placeholder="Image screenshot" value="{$screenshot}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="screenshot">Image ScreenShot</a>
               </label>
            </div>
            {/foreach}
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="category" placeholder="Category" value="{$appCategory}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="category">Category</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="createdAt" placeholder="createdAt" value="{$appCreatedAt}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="createdAt">createdAt</a>
               </label>
            </div>
         </div>
         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="version" placeholder="version" value="{$appVersion}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="version">version</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="reviewsCount" placeholder="reviewsCount" value="{$appReviewsCount}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="reviewsCount">Reviews Count</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="platformVersion" placeholder="platformVersion" value="{$appPlatformVersion}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="platformVersion">Platform Version</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="rating" placeholder="rating" value="{$appRating}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="rating">Rating</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="size" placeholder="size" value="{$appSize}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="size">Size</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="iosUrl" placeholder="iosUrl" value="{$iosUrl}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="iosUrl">iosUrl</a>
               </label>
            </div>
         </div>


         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="androidUrl" placeholder="androidUrl" value="{$androidUrl}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="androidUrl">androidUrl</a>
               </label>
            </div>
         </div>

         <div class="row">
            <div class="input-field col s12">
               <input type="text" class="validate" name="windowsUrl" placeholder="windowsUrl" value="{$windowsUrl}">
               <label data-success="right">
               <a class="tooltipped" data-delay="50" data-tooltip="windowsUrl">windowsUrl</a>
               </label>
            </div>
         </div>

         <center>
            <button type="submit" name="insert" value="1" class="waves-effect waves-light btn">
            Insert to App</button>
         </center>
      </form>
   </div>
</div>

{/block}
