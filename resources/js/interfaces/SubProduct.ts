import { Ingredient } from "./Ingredient";
import { Supplement } from "./Supplement";

export interface SubProduct{
    created_at   : Date;
    default      : Boolean;
    group_id     : Number;
    id           : Number;
    ingredient   : Ingredient;
    ingredient_id: Number;
    max          : Number;
    name         : String;
    price        : Number;
    store_id     : Number;
    supplement   : Supplement;
    supplement_id: Number;
    updated_at   : Date;
    disabledPlus : boolean;
    disabledMinus: boolean;
    required     : Boolean
}