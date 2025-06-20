import { Injectable } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Task } from './task.entity';
import { Repository } from 'typeorm';

@Injectable()
export class TaskService {
  constructor(
    @InjectRepository(Task)
    private tasksRepo: Repository<Task>,
  ) {}

  create(taskData: Partial<Task>) {
    const task = this.tasksRepo.create(taskData);
    return this.tasksRepo.save(task);
  }

  findAll() {
    return this.tasksRepo.find({ relations: ['user'] });
  }

  findOne(id: number) {
    return this.tasksRepo.findOne({ where: { id }, relations: ['user'] });
  }

  async update(id: number, taskData: Partial<Task>) {
    await this.tasksRepo.update(id, taskData);
    return this.findOne(id);
  }
  
  async remove(id: number) {
    await this.tasksRepo.delete(id);
    return { msg: 'Delete Success'};
  }
  // getTask(id: string) {
  //   console.log(id);
  //   return {
  //     name: 'Task 1',
  //     description: 'Description of Task 1',
  //     createdAt: new Date().toISOString(),
  //     completedAt: null,
  //     userId: 1,
  //   };
  // }
  // createTask(body: any) {
  //   console.log(body, 'Srey ');
  //   return {
  //     name: 'Task 1',
  //     description: 'Description of Task 1',
  //     createdAt: new Date().toISOString(),
  //     completedAt: null,
  //     userId: 1,
  //   };
  // }
  // updateTask(id: string, body: any) {
  //   console.log(body);
  //   return {
  //     name: 'Task 1',
  //     description: 'Description of Task 1',
  //     createdAt: new Date().toISOString(),
  //     completedAt: null,
  //     userId: 1,
  //   };
  // }
  // deleteTask(id: string) {
  //   console.log(id);
  //   return { message: 'success' };
  // }

  // findAll() {
  //   // return this.usersRepo.find({ relations: ['tasks'] });
  //   return { msg: 'ot kernh'}
  // }
}
