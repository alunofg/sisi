// import { IRole } from './IRole';

export interface IUser {
  id?:         number;
  name?:       string;
  cpf?:        string;
  email:       string;
  password:    string;
  birthdate?:  string;
  gender?:     string;
  skin_color?: string;
  cellphone?:  string;
  phone?:      string;
  status?:     string;
  role?:       any;
  created_at?: string;
  updated_at?: string;
}
