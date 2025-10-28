import { Group } from "./Group";

export interface Product {
    selectedSizeIndex: number | null;
    hasSize: boolean | null;
    AT_PLACE: boolean;
    CAC: boolean;
    LIV: boolean;
    category_id: number;
    category_name: string;
    categoryImg?: string;
    logo?: string; // remove this after change all image by bankImage
    created_at: string;
    description: string;
    groups: Group[];
    id: number;
    is_enabled: boolean;
    is_promo: boolean;
    name: string;
    path_image: string;
    price: number;
    promos?: any[];
    store_id: number;
    thumbnail_image: string;
    updated_at: Date;
    bankimage?: any;
    bank_path_image: string;
    bank_thumbnail_image: string;
    preparation_time_liv?: String | null;
    preparation_time_cac?: String | null;
}