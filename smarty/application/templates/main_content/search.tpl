{extends file="smarty/application/templates/base.tpl"}
{block name=contenuto}

<div class="container">
  <div class="row">
    {foreach from=$search item=result}
      <div class="col s12 m3">
        <div class="card">
          <div class="card-image waves-effect waves-block waves-light">
            <a href="app_details.php?id={$result['idApp']}">
              <img class="circle" src="{$result['iconUrl']}">
            </a>
          </div>
          <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">
              <h4 class="tit_home">
                <a href="app_details.php?id={$result['idApp']}">{$result['name']}</a>
              </h4>
              <div class="icon">
                {if $result['androidUrl'] != ''}
                <a href="{$result['androidUrl']}" target="_blank"><img src="images/android.png"></a>
                {/if}

                {if $result['iosUrl'] != ''}
                <a href="{$result['iosUrl']}" target="_blank"><img src="images/apple.png"></a>
                {/if}

                {if $result['windowsUrl'] != ''}
                <a href="{$result['windowsUrl']}" target="_blank"><img src="images/windows.png"></a>
                {/if}
              </div>
              <div class="bloccoContenuti_home">
                <h6><strong style="color:#FF0000">Category:</strong><br>{$result['category']}</h6>
                <h6><strong style="color:#FF0000">Added:</strong><br>{$result['createdAt']}</h6>
              </div>
            </span>
            <p class="buttonView"><a class="waves-effect waves-light btn" href="app_details.php?id={$result['idApp']}">View</a></p>
          </div>
        </div>
      </div>

    {/foreach}
  </div>
</div>

{/block}
