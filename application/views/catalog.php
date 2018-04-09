<div class="avatar">

    <img id="guy" src="assets/img/guy.png" alt="Avatar">

    <div id='overlay'>

        <!-- These are the items.
        TODO: give an ID to each for indentification -->
        <div id="all-items" class="items">
          {categories}
            <h2>{categoryName}</h2>
            {accessories}
              <div id="{accessoryName}" class="couponcode">
                <img class="draggable drag-drop {categoryName}" src="{accessoryImage}"/>
                <div class="coupontooltip">
                  <div class="coupontooltip-text">
                    <h4>{accessoryDisplayName}</h4>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Attribute</th>
                          <th scope="col">Level</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Weight</td>
                          <td id="weight">{accessoryWeight}</td>
                        </tr>
                        <tr>
                          <td>Damage</td>
                          <td id="damage">{accessoryDamage}</td>
                        </tr>
                        <tr>
                          <td>Protection</td>
                          <td id="protection">{accessoryProtection}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            {/accessories}
          {/categories}
        </div>
    </div>
</div>
