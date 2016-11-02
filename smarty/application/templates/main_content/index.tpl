{extends file="smarty/application/templates/base.tpl"}
{block name=body}
<div class="container">
  <div class="row">
    <div class="col s12 m12">
      <div class="nav-wrapper">
        <form role="search" action="apps.php" method="GET" class="form-inline" style="text-align:center;">
          <h4 class="searchALL">Search ALL:</h4>
          {if isset($insertError)}
            <div class="card-panel teal lighten-2"><strong><center>Attenzione!</strong>{$insertError}</center></div>
          {/if}

          <div class="input-field">
            <input type="search" name="search" required placeholder="search...">
             <button class="waves-effect waves-light btn" type="submit" value="search">Search</button>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <h4 style="text-align:center;">Breve Descrizione</h4>
      <p></p>
  </div>
</div>

<!--
  Qui visualizzo tutte le info della tabella App
  presenti nel database con il file index.php
-->
<div class="container">
  <div class="row">
    {foreach from=$app item=application}
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <a href="app_details.php?id={$application['idApp']}">
              <img class="circle" src="{$application['thumb']}">
            </a>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
              <h5 class="tit_home">
                <a href="app_details.php?id={$application['idApp']}">{$application['name']}</a>
              </h5>
              <div class="icon">

                <!-- Questo controllo inizia qui
                     Serve per far vedere all'utente o sviluppatore
                     l'immagine in cui è supportata l'applicazione
                     se iosURL, o windowsURL sono stati inseriti nei
                     campi di inserimento allora appare l'immagine
                     altrimenti no
                -->
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
                <h6><strong style="color: #FF0000">Category:</strong>
                  <br>{$application['category']}</h6>
                <h6><strong style="color: #FF0000">Added:</strong>
                  <br>{$application['createdAt']}</h6>
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
