import { Group } from "../interfaces/Group";
import { Product } from "../interfaces/Product";
import { GroupOrder } from "../interfaces/cart/GroupOrder";
import { ProductOrder } from "../interfaces/cart/ProductOrder";
import { SubProductOrder } from "../interfaces/cart/SubProductOrder";
import global from "./global"
export default class ProductUtils {
  constructor(products) {
    this.products = products;
  }

  static productPrice(product) {
    // Get the subproduct price of the default subproduct in the "size" group
    let groupSize = null;
    groupSize = product?.groups.find((group) => group?.type === "size");
    let price = product?.price;
    let defaultSubProduct = null;
    if (groupSize) {
      if (!groupSize.used) {
        defaultSubProduct = groupSize?.sub_products.find(
          (sub_products) => sub_products.default === 1
        );
      }
      if (groupSize?.used) {
        defaultSubProduct = null;
        defaultSubProduct = groupSize?.sub_products.find(
          (sub_products) => sub_products.checked
        );
      }
      price = defaultSubProduct ? defaultSubProduct?.price : product?.price;
    }
    return price;
  }

  static productName(product) {
    // Get the subproduct price of the default subproduct in the "size" group
    let groupSize = null;
    groupSize = product?.groups.find((group) => group?.type === "size");
    let name = product?.name;
    let usedSubProduct = null;
    if (groupSize) {
      if (groupSize?.used) {
        usedSubProduct = null;
        usedSubProduct = groupSize?.sub_products.find(
          (sub_products) => sub_products.checked
        );
      }
      name = usedSubProduct ? name + " " + usedSubProduct?.name : product?.name;
    }
    return name;
  }

  static totalPriceOrder(detailsOrder) {
    let total = 0;
    if (detailsOrder.elements_order != undefined) {
      detailsOrder.elements_order.forEach((element) => {
        total += element.total_amount_element_subelements;
      });
    }
    return total;
  }

  static productPriceOrdered(element) {
    let price = element.price;
    element.sub_elements_order.map(function (sub_element_order, IndexGrp) {
      if (sub_element_order.type == "size") {
        price = sub_element_order.price;
      }
    });
    element.newPrice = price;
    return price;
  }
  static productNameOrdered(element) {
    let name = element.product.name;
    element.sub_elements_order.map(function (sub_element_order, IndexGrp) {
      if (sub_element_order.type === "size") {
        name = name + "  " + sub_element_order.sub_product.name;
      }
    });
    return name;
  }

  /** Achraf Functions */
  static prepareMyProduct(product: Product, categoryImg: String): ProductOrder {
    let ui = {};
    let groupSubCount = 0
    let enabled_to_order = false;
    let total_qte_sub_products = 0
    let path_image = global.getImageUrl(product, 'product')
    
    // if (product?.bank_path_image) {
    //   path_image = product?.bank_path_image;
    // } if (product?.bankimage?.path_image) {
    //   path_image = product?.bankimage?.path_image;
    // } else if (product?.bankimage?.thumbnail_image) {
    //   path_image = product?.bankimage?.thumbnail_image;
    // } else if (product?.path_image) {
    //   path_image = product?.path_image;
    // } else if (product?.thumbnail_image) {
    //   path_image = product?.thumbnail_image;
    // } else if (product?.categoryImg) {
    //   path_image = product?.categoryImg;
    // } else if (product?.logo) {
    //   path_image = product?.logo;
    // } else {
    //   path_image = process?.env?.MIX_APP_URL + '' + process?.env?.MIX_DEFAULT_IMAGE || ''
    // }
    let selectedSizeIndex = null
     
    const preparedProduct: ProductOrder = {
    
      id: product.id,
      path_image: path_image,
      name: product.name,
      description: product.description,
      category_name: product?.category?.name ? product?.category?.name : product?.category_name ? product.category_name : null,
      categoryImg: categoryImg,
      ingredient_names: "",
      price: product.price,
      quantity: 1,
      groups: product.groups.map((group: Group, indexGroup: number) => {
        total_qte_sub_products = 0
        let buttonType = "";
        if (group.min == 1 && group.max == 1 && !group.is_ingredient) {
          buttonType = "RadioButton";
        } else if (group.is_ingredient == true) {
          buttonType = "CheckboxButton";
        } else {
          buttonType = "PlusMinusButton";
        }

        if (group.type == "size") {
           selectedSizeIndex = 1
        }
        //let required = group.min != null && group.min > 0 ? true : false;
        const preparedGroup: GroupOrder = {
            id: group.id,
            title: group.title,
            button_type: buttonType,
            required: group.is_required === true || group.min > 0,
            is_ingredient: group.is_ingredient,
            type: group.type,
            sub_products: group.sub_products.map(
                (sub_product: SubProductOrder, indexSubProduct: number) => {
                    groupSubCount++;
                    let promoSize =
                        product?.promos?.filter(
                            (promoObj: any) =>
                                promoObj.sub_product_id == sub_product.id
                        ) || [];
                    promoSize = promoSize.length > 0 ? promoSize[0] : null;
                    const preparedSubProduct: SubProductOrder = {
                        id: sub_product.id,
                        name: sub_product.name,
                        promo: promoSize,
                        price:
                            sub_product?.supplement &&
                            !sub_product?.is_customizable_price
                                ? sub_product?.supplement?.price
                                : sub_product?.price,
                        unit_price:
                            sub_product?.supplement &&
                            !sub_product?.is_customizable_price
                                ? sub_product?.supplement?.price
                                : sub_product?.price,
                        default:
                            sub_product.default === true ||
                            (sub_product.max ? sub_product.max > 0 : false),
                        quantity:
                            sub_product.default === true ||
                            (sub_product.max ? sub_product.max > 0 : false)
                                ? 1
                                : 0,
                        max: sub_product.max,
                        disabled_plus: false,
                        disabled_minus: true,
                        checked: sub_product.default ? true : false,
                        ingredient: sub_product?.ingredient,
                        supplement: sub_product?.supplement,
                    };
                    total_qte_sub_products += sub_product.default ? 1 : 0;
                    return preparedSubProduct;
                }
            ),
            total_qte_sub_products: total_qte_sub_products, //0,
            total_sub_products: 0,
            max:
                buttonType == "PlusMinusButton" && group.max == 0
                    ? null
                    : group.max,
            min: group.min,
            is_disabled: false,
            used: false,
        };
        return preparedGroup;
      }),
      liv: product.LIV,
      cac: product.CAC,
      at_place: product.AT_PLACE,
      total: product.price,
      promos: product?.promos ?? [],
      enabled_to_order: false,
      selectedSizeIndex: selectedSizeIndex,
      hasSize: selectedSizeIndex ? true : false
    };
    
    if (groupSubCount > 0) {
      ui = {
        width: "sm:max-w-md md:max-w-lg lg:max-w-3xl xl:max-w-4xl",
        columns: { col_1: "col-md-8", col_2: "col-md-4" },
        groups: true
      };
    } else {
      ui = {
        width: "sm:max-w-lg md:max-w-lg lg:max-w-lg xl:max-w-lg",
        columns: { col_1: "col-md-0 d-none ", col_2: "col-md-12" },
        groups: false
      };
    }


    preparedProduct.ui = ui
    preparedProduct.enabled_to_order =
      this.checkIsEnabledToOrder(preparedProduct);
    preparedProduct.total = this.totalProduct(preparedProduct);
    preparedProduct.ingredient_names = this.concatenateNamesIngredients(
      preparedProduct,
      false
    );
    return preparedProduct;
  }


  static initPrice(product: ProductOrder): Boolean {
    product.groups?.forEach((group) => { 
      if (group.button_type == "CheckboxButton" || group.button_type == "PlusMinusButton" || (group.button_type == "RadioButton" && group.type !== 'size') ) {
        group.sub_products.forEach((subProduct: any) => {
          subProduct.quantity = 0
          subProduct.checked = false 
        });
        group.used = false
      }
    }); 
    return true
  }

  static totalProduct(product: ProductOrder): number {
    let total = product.price * product.quantity;
    product.groups?.forEach((group) => {
      if (group.button_type == "RadioButton") {
        if (group.type == "size") {
          group.sub_products.forEach((subProduct: any) => {
            if (subProduct.checked) {
              total =
                total == 0
                  ? subProduct.price * product.quantity
                  : total + subProduct.price * product.quantity;
            }
          });
        } else {
          group.sub_products.forEach((subProduct: any) => {
            if (subProduct.checked) {
              total += subProduct.price * product.quantity;
            }
          });
        }
      } else if (group.button_type == "CheckboxButton") {
      } else {
        group.sub_products.forEach((subProduct: any) => {
          total +=
            subProduct.unit_price * subProduct.quantity * product.quantity;
        });
      }
    });
    return total;
  }

  static concatenateNamesIngredients(productOrGroup: any, isGroup = true) {
    let names = "";
    if (isGroup) {
      if (productOrGroup.type == "ing") {
        productOrGroup.sub_products.forEach(
          (subproduct: SubProductOrder, index: number) => {
            if (subproduct.checked) {
              if (index === productOrGroup.sub_products.length - 1) {
                names += subproduct.name;
              } else {
                names += subproduct.name + ", ";
              }
            }
          }
        );
        return names.trim();
      }
    } else {
      productOrGroup.groups?.forEach((group: GroupOrder, indexGrp: number) => {
        if (group.type == "ing") {
          group.sub_products.forEach((subproduct, index) => {
            if (subproduct.default) {
              if (index === group.sub_products.length - 1) {
                names += subproduct.name;
              } else {
                names += subproduct.name + ", ";
              }
            }
          });
          return names.trim();
        }
      });
    }
    return names.trim();
  }

  static checkIsEnabledToOrder(product: ProductOrder) {
    //&& group.button_type == "RadioButton"
    product?.groups?.forEach((group: GroupOrder, indexGroup: number) => {
      console.log('group.required', group.required);
      if (group.required) {
        group.used =
          group?.sub_products.filter(
            (subProductObj) =>
              subProductObj.checked ||
             // subProductObj.default ||
              subProductObj.quantity > 0
          ).length > 0;
          console.log("group.used", group.used);
      }
    });

    // group.button_type == "RadioButton"
    return product?.groups.filter((group) => !group.used && group.required)
      .length > 0
      ? true
      : false;
  }

  static checkGroupIsUsed(product: ProductOrder): ProductOrder {
    product?.groups?.map((groupObj, indexGrp) => {
      let used = true;
      if (groupObj?.button_type == "RadioButton") {
        used = groupObj?.sub_products.find(
          (subProductObj) => subProductObj?.checked
        )
          ? true
          : false;
      } else if (groupObj?.button_type == "PlusMinusButton") {
        used = groupObj?.sub_products.find(
          (subProductObj) => subProductObj?.quantity
        )
          ? true
          : false;
      }
      groupObj.used = used;
    });
    return product;
  }

  static isGroupUsed(group: GroupOrder): Boolean {
    let used = true;
    if (group?.button_type == "RadioButton") {
      used = group?.sub_products.find((subProductObj) => subProductObj?.checked)
        ? true
        : false;
    } else if (group?.button_type == "PlusMinusButton") {
      used = group?.sub_products.find(
        (subProductObj) => subProductObj?.quantity
      )
        ? true
        : false;
    } else if (group?.button_type == "CheckboxButton") {
      used = group?.sub_products.find(
        (subProductObj) => subProductObj?.quantity && subProductObj?.checked
      )
        ? true
        : false;
    }
    return used;
  }
  /** CHECK LIST PRODUCTS ADDED ON CART IF HAS the DELIVERY MODE SELECTED */
  static CheckingAvailabilityProducts(products, deliveryMode) {
    const filteredProducts = products.filter(
      (product) =>
        !product[deliveryMode]
    );
    return filteredProducts;
  }


}
