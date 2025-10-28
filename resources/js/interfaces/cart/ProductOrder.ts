import { GroupOrder } from "./GroupOrder";
export interface ProductOrder {
  selectedSizeIndex: number | null;
  hasSize: boolean | null;
  id: number;
  path_image: string;
  name: string;
  category_name: string;
  ingredient_names: string;
  description: string;
  price: number;
  quantity: number;
  groups?: GroupOrder[];
  liv: boolean;
  cac: boolean;
  at_place: boolean;
  total: number;
  promos?: any[]; //to update it
  ui?: object;
  enabled_to_order?: boolean;
  categoryImg?: String;
  preparation_time_liv?: String | null;
  preparation_time_cac?: String | null;
}
