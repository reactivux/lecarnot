export interface SubProductOrder {
    id: number;
    name: string;
    promo: object;
    price?: number;
    quantity?: number;
    max?: number;
    default: Boolean;
    disabled_plus?: boolean;
    disabled_minus?: boolean;
    checked?: boolean;
    unit_price?: number;
    ingredient?: object;
    supplement?: object;
    is_customizable_price?: boolean;
}
