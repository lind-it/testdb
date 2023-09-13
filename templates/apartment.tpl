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
                    {if !empty($array[row].cost)}
                        {$array[row].cost}&#8381;
                    {else}
                        Не указано					
                    {/if}
                    
                </p>

                <p class="card-text">
                    Вид: 
                    {if empty($array[row].view)}
                        Не указано					
                    {/if}
                    {$array[row].view}
                </p>

                <p class="card-text">
                    Материал:
                    {if empty($array[row].material)}
                        Не указано					
                    {/if}
                    {$array[row].material}
                </p>

                <p class="card-text">
                    Тип дома: 
                    {if empty($array[row].home_type)}
                        Не указано					
                    {/if}
                    {$array[row].home_type}
                </p>
                
                <h5>Оисание:</h5>
                <p class="card-text">{$array[row].desc}</p>

                <p class="card-text">
                    Телефон: 
                    {if empty($array[row].phone)}
                        Не указано					
                    {/if}
                    {$array[row].phone}
                </p>
                

                <a href="#" class="btn btn-primary btn-lg" style="width:350px">Купить</a>
            </div>
        </div>
{/section}
</div>

