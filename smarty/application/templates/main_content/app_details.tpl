{extends file="smarty/application/templates/base.tpl"}
{block name=contenuto}
<div class="container">
   <div class="row">
      <div class="col m3">
         <a href="{$storeData['iconUrl']}"> <img style="width:150px; margin-top:25px;" src="{$storeData['iconUrl']}"></a>
      </div>
      <div class="col m3">
         <h4 class="media-heading">{$store['name']}</h4>
         <br>
         <strong>{$store['createdAt']}</strong></br></br>
         <!-- Questo controllo inizia qui
              Serve per far vedere all'utente o sviluppatore
              l'immagine in cui è supportata l'applicazione
              se iosURL, o windowsURL sono stati inseriti nei
              campi di inserimento allora appare l'immagine
              altrimenti no
         -->
         {if $store['androidUrl'] != ''}
         <a href="{$store['androidUrl']}" target="_blank"><img src="images/android.png"></a>
         {/if}
         {if $store['iosUrl'] != ''}
         <a href="{$store['iosUrl']}" target="_blank"><img src="images/apple.png"></a>
         {/if}
         {if $store['windowsUrl'] != ''}
         <a href="{$store['windowsUrl']}" target="_blank"><img src="images/windows.png"></a>
         {/if}
         <!-- e finisce qui -->
      </div>
      <div class="col m4"><br>
        {if $store['submitterWebSite'] != ''}
        <strong>Sviluppatore</strong><br>
        <a href="{$store['submitterWebSite']}">Visita il sito web</a><br>
        {/if}
        {if $store['submitterEmail'] != ''}
        <p>{$store['submitterEmail']}</p>
        {/if}
      </div>
   </div>

</div>
<div class="container">
   <div class="row">
      <div class="col m12">
         <h4>Screenshot:</h4>
      </div>
      <div class="carousel">
        <!-- Questo è un ciclo , dato che ci sono molte
             immagini di screenshot, esso me le fa vedere
             tutte
        -->
         {foreach from=$screenshots item=screenshot}
         <a href="{$screenshot['url']}">
         <img style="width:25%;" src="{$screenshot['url']}">
         </a>
         {/foreach}
      </div>
   </div>
   <div class="col m12">
      <h5>The app is compatible with some of your devices:</h5>
      <div class="row">
         <div class="col s12">
            <ul class="tabs">
               <li class="tab col s3"><a href="#test1"><img src="images/android.png"></a></li>
               <li class="tab col s3"><img src="images/apple.png"></li>
               <li class="tab col s3"><img src="images/windows.png"></li>
            </ul>
         </div>
         <div id="test1" class="col s12">
            <table>
               <thead>
                  <tr>
                     <th>Version</th>
                     <th>Rating</th>
                     <th>Size</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>{$storeData['version']}</td>
                     <td>{$storeData['rating']}</td>
                     <td>{$storeData['size']}</td>
                  </tr>
               </tbody>
            </table>
            <table>
               <thead>
                  <tr>
                     <th>Reviews Count</th>
                     <th>Platform Version</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>{$storeData['reviewsCount']}</td>
                     <td>
                        {$storeData['platformVersion']}
                     </td>
                  </tr>
               </tbody>
            </table>
            <table>
               <thead>
                  <tr>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>{$store['oneLiner']}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
{/block}
