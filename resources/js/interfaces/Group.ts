import { SubProduct } from "./SubProduct";

export interface Group {
  created_at: Date;
  free: boolean;
  id: number;
  is_ingredient: boolean;
  max: number;
  min: number;
  product_id: number;
  store_id: number;
  sub_products: SubProduct[];
  title: string;
  updated_at: Date;
  type: string;
  is_required: boolean;
}
