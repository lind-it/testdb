<div class="d-flex flex-wrap">
    {section name=row loop=$array}
        <div class="card" style="width: 25rem;">
            {section name=photo loop=$array[row].photos}
                <img class="card-img-top" src="{$array[row].photos[photo]}" alt="Card image cap">
            {/section}
            <div class="card-body">
            
                <h5 class="card-title">{$array[row].adress}</h5>

                <p class="card-text">Площадь: {$array[row].area} кв.м.</p>

                <p class="card-text">
                    Стоимость: 
                    {if !empty($array[row].coast)}
                        {$array[row].coast}&#8381;
                    {else} 
                        Не указано					
                    {/if}
                </p>

                <p class="card-text">
                    Вид: 
                    {if !empty($array[row].view)}
                        {$array[row].view}
                    {else} 
                        Не указано					
                    {/if}
                </p>

                <p class="card-text">
                    Материал:
                    {if !empty($array[row].material)}
                        {$array[row].material}
                    {else} 
                        Не указано					
                    {/if}
                </p>

                <p class="card-text">
                    Тип дома: 
                    {if !empty($array[row].home_type)}
                        {$array[row].home_type}
                    {else} 
                        Не указано					
                    {/if}
                </p>
                
                <h5>Оисание:</h5>
                <p class="card-text">{$array[row].desc}</p>

                <p class="card-text">
                    Телефон: 
                    {if !empty($array[row].phone)}
                        {$array[row].phone}
                    {else} 
                        Не указано					
                    {/if}
                </p>
                

                <a href="#" class="btn btn-primary btn-lg" style="width:350px">Купить</a>
            </div>
        </div>
{/section}
</div>

