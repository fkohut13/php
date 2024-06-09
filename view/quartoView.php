<?php

namespace App\view\quartoView;
require_once("./autoload.php");
class Quarto {
    
    public static function paginaQuarto(){
         ?>
            <div class="container">
            <section class="imagemquarto">
                    <picture>
                        <img src="assets/q1.webp" alt="">
                    </picture>
                    <picture>
                        <img src="assets/q2.webp" alt="">
                    </picture>
                    <picture>
                        <img src="assets/q3.webp" alt="">
                    </picture>
                    <picture>
                        <img src="assets/q4.webp" alt="">
                    </picture>
                    <picture>
                        <img src="assets/q5.webp" alt="">
                    </picture>
                </section>
                <header>
                    <h1>Chalé Palmen Haus com banheira de hidromassagem</h1>

                    <div class="information">
                        <div class="information__left">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" 
                            fill="#5f6368"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 
                            97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 
                            149Zm247-350Z"/></svg>
                                <strong>4,99</strong>
                            </div>
                            <div>
                                <a href="#">247 Comentarios</a>
                            </div>
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                             fill="#5f6368"><path d="m520-260 140-140q11-11 17.5-26t6.5-32q0-34-24-58t-58-24q-19 0-37.5 
                             11T520-492q-30-28-47-38t-35-10q-34 0-58 24t-24 58q0 17 6.5 32t17.5 26l140 140Zm336-130L570-104q-12 
                             12-27 18t-30 6q-15 0-30-6t-27-18L103-457q-11-11-17-25.5T80-513v-287q0-33 23.5-56.5T160-880h287q16 
                             0 31 6.5t26 17.5l352 353q12 12 17.5 27t5.5 30q0 15-5.5 29.5T856-390ZM513-160l286-286-353-354H160v286l
                             353 354ZM260-640q25 0 42.5-17.5T320-700q0-25-17.5-42.5T260-760q-25 0-42.5 17.5T200-700q0 25 17.5 42.5
                             T260-640Zm220 160Z"/></svg>
                                <span>Superhost</span>
                            </div>
                            <div>
                                <a href="">Benedito Novo, Brasil</a>
                            </div>
                        </div>
                        <div class="information__right">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" 
                                    fill="#5f6368"><path d="M720-80q-50 0-85-35t-35-85q0-7 1-14.5t3-13.5L322-392q-17 15-38 23.5
                                    t-44 8.5q-50 0-85-35t-35-85q0-50 35-85t85-35q23 0 44 8.5t38 23.5l282-164q-2-6-3-13.5t-1-14.5
                                    q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35q-23 0-44-8.5T638-672L356-508q2 6 3 13.5t
                                     14.5q0 7-1 14.5t-3 13.5l282 164q17-15 38-23.5t44-8.5q50 0 85 35t35 85q0 50-35 85t-85 35Zm0-64
                                     0q17 0 28.5-11.5T760-760q0-17-11.5-28.5T720-800q-17 0-28.5 11.5T680-760q0 17 11.5 28.5T720-
                                     720ZM240-440q17 0 28.5-11.5T280-480q0-17-11.5-28.5T240-520q-17 0-28.5 11.5T200-480q0 17 11.5
                                      28.5T240-440Zm480 280q17 0 28.5-11.5T760-200q0-17-11.5-28.5T720-240q-17 0-28.5 11.5T680-200
                                      q0 17 11.5 28.5T720-160Zm0-600ZM240-480Zm480 280Z"/></svg>
                                    <span>Compartilhar</span>
                                </button>
                                <button>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" 
                                fill="#5f6368"><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 
                                63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771
                                -395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100
                                -40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36
                                 45.5 98 107T480-228Zm0-273Z"/></svg>
                                    <span>Salvar</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="container2">
                            <p id="preco"><b>R$559</b> noite</p>
                            <div class="datas">
                                <div class="checkin">
                                    <label for="checkin">CHECK-IN</label>
                                    <input type="date" id="checkin" value="2024-06-08">
                                </div>
                                <div class="checkout">
                                    <label for="checkout">CHECK-OUT</label>
                                    <input type="date" id="checkin" value="2024-06-09">
                                </div>
                            </div>
                            <div class="hospedes">
                                <label for="quantidadeHospededs">HÓSPEDES</label>
                                <select id="quantidadeHospedes">
                                    <option value="1">1 hóspede</option>
                                    <option value="2">2 hóspedes</option>
                                    <option value="3">3 hóspedes</option>
                                    <option value="4">4 hóspedes</option>
                                    <option value="5">5 hóspedes</option>
                                    <option value="6">6 hóspedes</option>
                                    <option value="7">7 hóspedes</option>
                                    <option value="8">8 hóspedes</option>
                                    <option value="9">9 hóspedes</option>
                                    <option value="10">10 hóspedes</option>
                                </select>
                            </div>
                            <button type="submit">Reservar</button>
                    </div>
                </header>
                
                
            </div>
    <?php
    }
 
}
