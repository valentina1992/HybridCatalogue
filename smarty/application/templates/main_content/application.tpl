{extends file="smarty/application/templates/base.tpl"}
{block name=body}
<div class="container">
  <div class="row">
    <div class="col s12 m12">
      <div class="nav-wrapper">
        <form role="search" action="apps.php" method="GET" class="form-inline" style="text-align:center";>
          <h4 class="searchALL">Search ALL:</h4>

          <div class="input-field">
            <input type="search" name="search" required placeholder="search...">
             <button style="text-align:center;" class="waves-effect waves-light btn" type="submit" value="search">Search</button>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    {foreach from=$app item=application}
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <a href="app_details.php?id={$application['idApp']}">
              <img class="circle" src="{$application['iconUrl']}">
            </a>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
              <h4 class="tit_home">
                <a href="app_details.php?id={$application['idApp']}">{$application['name']}</a>
              </h4>

              <!-- Questo controllo inizia qui
                   Serve per far vedere all'utente o sviluppatore
                   l'immagine in cui è supportata l'applicazione
                   se iosURL, o windowsURL sono stati inseriti nei
                   campi di inserimento allora appare l'immagine
                   altrimenti no
              -->
              <div class="icon">
                {if $application['androidUrl'] != ''}
                <a href="{$application['androidUrl']}" target="_blank"><img src="images/android.png"></a>
                {/if}

                {if $application['iosUrl'] != ''}
                <a href="{$application['iosUrl']}" target="_blank"><img src="images/apple.png"></a>
                {/if}

                {if $application['windowsUrl'] != ''}
                <a href="{$application['windowsUrl']}" target="_blank"><img src="images/windows.png"></a>
                {/if}
              </div>
              <div class="bloccoContenuti_home">
                <h6><strong style="color:#FF0000">Category:</strong><br>{$application['category']}</h6>
                <h6><strong style="color:#FF0000">Added:</strong><br>{$application['createdAt']}</h6>
              </div>
            </span>
            <p class="buttonView"><a class="waves-effect waves-light btn" href="app_details.php?id={$application['idApp']}">View</a></p>
          </div>
        </div>
      </div>

    {/foreach}
  </div>
</div>

{/block}
