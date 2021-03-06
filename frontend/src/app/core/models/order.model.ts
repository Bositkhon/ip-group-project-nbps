import { Deserializable } from './deserializable.model';
import { User } from './user.model';
import { OrderItem } from './orderItem.model';


export class Order implements Deserializable {
  user: User;
  orderItems: OrderItem[];
  total: number;
  created_at: string;
  updated_at: string;
  
  deserialize(input: any): this {
    this.user = new User().deserialize(input.user);
    this.orderItems = input.orderItems.map(el => new OrderItem().deserialize(el));

    return this;
  };

}