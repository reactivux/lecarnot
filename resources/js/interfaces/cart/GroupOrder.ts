import {SubProductOrder} from './SubProductOrder'

export interface GroupOrder{ 
    id: number;
    title: string;
    button_type : string;
    required: boolean;
    is_ingredient: boolean;
    type : string;
    sub_products: SubProductOrder[];
    free?: any;
    max: number | null;
    min: number | null ;
    is_disabled: boolean;
    total_qte_sub_products: number;
    total_sub_products: number;
    used?: boolean;
}