{extends file="smarty/application/templates/base.tpl"}
{block name=contenuto}

<div class="container">

    <div class="row">

      {if isset($insertError)}
        <div class="card-panel teal lighten-2"><strong><center>Attenzione!</strong>{$insertError}</center></div>
      {/if}
    </div>

    <div class="row">
        <form class="col s12 m6" name="form1" class="form-horizontal" action="inserimento.php" method="POST">
          <div class="row">
            <div class="input-field col s12">
              <input type="text" class="validate" name="id" placeholder="googlePlayID">
              <label data-success="right">
                <a class="tooltipped" data-delay="50" data-tooltip="insert title app">AppID</a>
              </label>
            </div>
          </div>

          <button type="submit"
          class="waves-effect waves-light btn">Insert to App</button>
        </form>
    </div>
</div>

{/block}
